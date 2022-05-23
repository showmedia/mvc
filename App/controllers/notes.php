<?php

    use App\core\controller;
    use App\Auth;

    class Notes extends Controller{
        public function index(){

            $note = $this->model('Note');
            $dados = $note->getAll();

            $this->view('home/index', $dados);
        }
        public function ver($id = ''){

            $note = $this->model('Note');
            $dados = $note->findId($id);

            $this->view('notes/ver', $dados);
        }

        public function criar(){
            Auth::checklogin();

            $mensagem = array();
            if(isset($_POST['cadastrar'])):

                if(empty($_POST['titulo'])):
                    
                    $mensagem[] = "O campo titulo não pode ser em branco";
                elseif(empty($_POST['texto'])):
                    $mensagem[] = "O campo texto não pode ser em branco";
                else:
                    //upload de arquivos
                    
                        $storage = new \Upload\Storage\FileSystem('uploads');
                        $file = new \Upload\File('foo', $storage);

                        // Optionally you can rename the file on upload
                        $new_filename = uniqid();
                        $file->setName($new_filename);

                        // Validate file upload
                        // MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
                        $file->addValidations(array(
                            // Ensure file is of type "image/png"
                            new \Upload\Validation\Mimetype('image/jpg'),

                            //You can also add multi mimetype validation
                            //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))

                            // Ensure file is no larger than 5M (use "B", "K", M", or "G")
                            new \Upload\Validation\Size('5M')
                        ));

                        // Access data about the file that has been uploaded
                        $data = array(
                            'name'       => $file->getNameWithExtension(),
                            'extension'  => $file->getExtension(),
                            'mime'       => $file->getMimetype(),
                            'size'       => $file->getSize(),
                            'md5'        => $file->getMd5(),
                            'dimensions' => $file->getDimensions()
                        );

                        // Try to upload file
                        try {
                            // Success!
                            $file->upload();
                            $mensagem[] = "Upload feito com sucesso!";
                        } catch (\Exception $e) {
                            // Fail!
                            $errors = $file->getErrors();
                            $mensagem[] = implode("<br>", $errors);
                        }



                    $note = $this->model('Note');
                    $note->titulo = $_POST['titulo'];
                    $note->texto = $_POST['texto'];
                    $mensagem[] = $note->save();    
                endif;

            endif;

            $this->view('notes/criar', $dados = ['mensagem' => $mensagem]);
        }

        public function editar($id){
            Auth::checklogin();

            $mensagem = array();
            $note = $this->model('Note');
            if(isset($_POST['atualizar'])):
                if(empty($_POST['titulo'])):
                    $mensagem[] = "O campo título não pode ficar em branco";
                elseif(empty($_POST['texto'])):
                    $mensagem[] = "O campo texto não pode ficar em branco";
                else:
                    $note->titulo = $_POST['titulo'];
                    $note->texto = $_POST['texto'];
                    $mensagem[] = $note->update($id);
                endif;
            endif;

            $dados = $note->findId($id);
            $this->view('notes/editar', $dados = ['mensagem' => $mensagem, 'registros' => $dados]);
        }

        public function excluir($id = '') {
            Auth::checklogin();
            $mensagem = array();
            $note = $this->model('Note');
            $mensagem[] = $note->delete($id);
            $dados = $note->getAll();
       
            $this->view('home/index', $dados = ['registros' => $dados, 'mensagem' => $mensagem]);
        }
    }