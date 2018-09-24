<?php
class Page extends Admin_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('page_m');
		$this->load->model('page_images_m');
	}

	function id($id=null) {
		$this->data['title'] = "Mariana de la Fuente";
		$this->data['page'] = new ePage();
		$this->data['page']->load(['id' => $id]);
		$this->data['padres'] = ePage::find();
		$this->data['folders'] = ePage::find(['padre' => $id]);
		$this->data['photos'] = ePagePhoto::find(['id' => $id]);
		$this->load->view('admin/page',$this->data);
	}

	function save($id=null)
	{
		$page = new ePage();
		if ($id) {
			$page->load(['id' => $id]);
		}
		$page->titulo = $this->input->post('titulo');
		$page->texto = $this->input->post('texto');
		$page->padre = $this->input->post('padre');

		if (!empty($_FILES['imagenPortada']) && $_FILES['imagenPortada']['name'] != '') {
			$actual = $page->portada;
			$ext = explode('.', basename($_FILES['imagenPortada']['name']));
			$name = md5(uniqid()) . "." . array_pop($ext);
			if (move_uploaded_file($_FILES['imagenPortada']['tmp_name'], $this->data['photosDirectory'] . $name)) {
				$page->portada = $name;
				if ($actual != '') {
					unlink($this->data['photosDirectory'] . $actual);
				}
			}
		}

		$page->save();
	}

	function delete($id) {
		// $photos = ePagePhoto::find(['id' => $id]);
		// foreach ($photos as $photo) {
		// 	$photo->delete();
		// 	unlink($this->data['photosDirectory']  . $photo->foto);
		// }
		$page = new ePage();
		$page->load(['id' => $id]);
		$page->delete();
	}

	function edit($id = NULL) {
		if ($id) {
			// Carga la pagina
			$this->data['page'] = $this->page_m->get($id);
			count($this->data['page']) || $this->data['errores'][] = 'Pagina no encontrada';

			// levanta imagenes ya cargadas
			$directorio = 'img/';
			$images = $this->page_images_m->get_images($id);
			$maxSecuencial = 0;

			$script = '$("#files").fileinput({
					uploadAsinc: false,
					showUpload: false,
					showRemove: false,
					overwriteInitial: false,
					overwrite:false,
					initialPreview: [';

			foreach ($images as $image) {
				$script .= "'<img src=" . '"' . site_url($directorio . $image->foto) . '" class="file-preview-image">' . "',";
				$maxSecuencial = ($image->secuencial > $maxSecuencial) ? $image->secuencial : $maxSecuencial;
			}
			$script .= '], initialPreviewConfig: [' ;

			foreach ($images as $image) {
				$script .= '{height:"120px", url:"' . site_url('admin/page/delete_image') . '/' . $image->id . '/' . $image->secuencial . '"},';
			}

			$script .= ']});';
			$this->data['myScript'] = $script;
		} else {
			$script = '$("#files").fileinput({
					uploadAsinc: false,
					showUpload: false,
					showRemove: false,
					overwriteInitial: false,
					overwrite:false,});';

			$this->data['myScript'] = $script;
			$this->data['page'] = $this->page_m->new_page();
		}
		// Carga campo para combo de padres
		$this->data['paginas_sin_padre'] = $this->page_m->paginas_sin_padre();
		// Setea reglas para form
		$rules = $this->page_m->rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			//Levanta campos del form
			$data = $this->page_m->array_from_post(array('descripcion','titulo','texto','padre'));
			// Guardo datos en BD
			$newId = $this->page_m->save($data, $id);

 			if (!empty($_FILES['files'])) {
 				$files = $_FILES['files'];
 				$success = null;
 				$paths = array();
 				// get file names
 				$filenames = $files['name'];

				// loop and process files
				for($i=0; $i < count($filenames); $i++){
					$ext = explode('.', basename($filenames[$i]));
					$target = $directorio . md5(uniqid()) . "." . array_pop($ext);
					if(move_uploaded_file($files['tmp_name'][$i], $target)) {
						$success = true;
						$paths[] = $target;
					} else {
						$success = false;
						break;
					}
				}

				if ($success === true) {
					// Guardar en BD
					foreach ($paths as $file) {
						$maxSecuencial += 1;
						$fileName = explode('/', $file);
						$imageData = array();
						$imageData['id'] = $id;
						$imageData['secuencial'] = $maxSecuencial;
						$imageData['foto'] = $fileName[1];
						$this->page_images_m->save_image($imageData);
						// revisar si no se insertta hago unlink?
					}
				} else {
					// delete any uploaded files
					foreach ($paths as $file) {
						unlink($file);
					}
				}
 			}

			// Redirijo al grid de paginas
			redirect('admin/page');
		}
		$this->data['subview'] = 'admin/page/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}


	function delete_image($id, $secuencial) {
		$directorio = 'img/';
		$imagen = $this->page_images_m->get_images($id, $secuencial);
		$this->page_images_m->deleteImage($id, $secuencial);
		unlink($directorio . $imagen->foto);
		echo 0;
	}
}
