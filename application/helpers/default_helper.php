<?php
if(!function_exists('get_custom_attribute_value')){
	function get_custom_attribute_value($id=false, $parent_category_id=false){
		$mahindra = & get_instance();
		$mahindra->load->model('products/App_products_model');
		$result = $mahindra->App_products_model->getCustomDetail($id, $parent_category_id);
		return $result;
	}
}



if(!function_exists('getCharacterGroupList')){
	function getCharacterGroupList($unqiueGroupId=false){
		$mahindra = & get_instance();
		$mahindra->load->model('characterstics/App_characterstics_model');
		$result = $mahindra->App_characterstics_model->get_unqiueGroupId($unqiueGroupId);
		return $result;
	}
}
if(!function_exists('getCategoryLabel')){
	function getCategoryLabel($cata_id=false){
		$mahindra = & get_instance();
		$mahindra->load->model('category/App_category_model');
		$result = $mahindra->App_category_model->getCategoryLabel($cata_id);
		if($result['status']=='true'){
			return $result;
		}else{
			return "";
		}
	}
}

if(!function_exists('getCountryLanguage')){
	function getCountryLanguage($lang_id=false){
		$mahindra = & get_instance();
		$mahindra->load->model('category/App_category_model');
		$result = $mahindra->App_category_model->languageList($lang_id);
		//pr($result);die;
		if(!empty($result)){
			return $result;
		}
	}
}

if(!function_exists('getCountryeditLanguage')){
	function getCountryeditLanguage($lang_id=false){
		$mahindra = & get_instance();
		$mahindra->load->model('cms/App_cms_model');
		$result = $mahindra->App_cms_model->countryList($lang_id);
		//pr($result);die;
		if(!empty($result)){
			return $result;
		}
	}
}

if(!function_exists('getBusinessCategory')){
	function getBusinessCategory($cata_id=false){
		if($cata_id >= 0){
			$mahindra = & get_instance();
			$mahindra->load->model('category/App_category_model');
			$result = $mahindra->App_category_model->getBusinessCategory($cata_id);
			if($result['status']=='true'){
				return $result['cate_name'];
			}else{
				return "";
			}
		}
	}
}

if(!function_exists('getCountryName')){
	function getCountryName($country_id=false){
		if($country_id >= 0){
			$mahindra = & get_instance();
			$mahindra->load->model('category/App_category_model');
			$result = $mahindra->App_category_model->getCountryName($country_id);
			if($result['status']=='true'){
				return $result['country_name'];
			}else{
				return "";
			}
		}
	}
}

/*
modify record by admin user.
get user id, ip address datetime and browser detail.
*/

if(!function_exists('modifyUserIpDetail')){
	function modifyUserIpDetail($user_id=false){
		if($user_id){
			$mahindra =  & get_instance();
			$ip_address = $mahindra->input->ip_address();
			if ($mahindra->agent->is_browser())
			{
				$agent = $mahindra->agent->browser().' '.$mahindra->agent->version();
			}
			elseif ($mahindra->agent->is_robot())
			{
				$agent = $mahindra->agent->robot();
			}
			elseif ($mahindra->agent->is_mobile())
			{
				$agent = $mahindra->agent->mobile();
			}
			else
			{
				$agent = '';
			}

			$modifyed_user = array();
			$modifyed_user['modified_date'] = date('Y-m-d H:i:s');
			$modifyed_user['modified_by'] = $user_id;
			$modifyed_user['modified_browser'] = $agent;
			$modifyed_user['modified_ip'] = $ip_address;
			return $modifyed_user;
		}
	}
}

/*
get user ip address and browser detail when create record.
*/

if(!function_exists('createUserIpDetail')){
	function createUserIpDetail($user_id=false){
		if($user_id){
			$mahindra =  & get_instance();
			$ip_address = $mahindra->input->ip_address();


			if ($mahindra->agent->is_browser())
			{
				$agent = $mahindra->agent->browser().' '.$mahindra->agent->version();
			}
			elseif ($mahindra->agent->is_robot())
			{
				$agent = $mahindra->agent->robot();
			}
			elseif ($mahindra->agent->is_mobile())
			{
				$agent = $mahindra->agent->mobile();
			}
			else
			{
				$agent = '';
			}

			$create_user = array();
			$create_user['created_date'] = date('Y-m-d H:i:s');
			$create_user['created_by'] = $user_id;
			$create_user['create_browser'] = $agent;
			$create_user['created_ip'] = $ip_address;
			return $create_user;
		}
	}
}

if(!function_exists('lang')){
	function lang($lang_key=false){
		if($lang_key){
			$mahindra = & get_instance();
			return $mahindra->lang->line($lang_key);
		}
	}
}

// for get user session detail from session 
if(!function_exists('getuserDetailFromSession')){
	function getuserDetailFromSession(){
		$mahindra = & get_instance();
		$session = $mahindra->session->all_userdata();
		$valid_session = $session['s_loginStatus'];
		if($valid_session == 'true'){
			return $session;
		}else{
			return 'false';
		}
	}
}
	
	//if session is active than move forword else redirect to login page
if(!function_exists('getSessionData')){
	function getSessionData(){
		$mahindra = & get_instance();
		$session = $mahindra->session->all_userdata();
		$valid_session = $session['s_loginStatus'];
		if($valid_session == 'true'){
			return $valid_session;
		}else{
			return 'false';
		}
	}
}
if(!function_exists('pr')){
	function pr($data=false){
		if($data){
			echo "<pre>";
			print_r($data);
		}
	}
}
//------------------------------------------------------------------------------------
if(!function_exists('generate_xor_key')){
	function generate_xor_key($length){
		
		$result = array_fill(0, $length, 0);
		for ($i = 0, $bit = 1; $i < $length; $i++) {
			for ($j = 0; $j < 3; $j++, $bit++) {
				$result[$i] |= ($bit % 2) << $j;
			}
		}
		return implode('', array_map('chr', $result));
	}
}

if(!function_exists('encode_id')){
	function encode_id($id, $encodedLength = 16, $rawBits = 16, $key = null){
		$maxRawBits = $encodedLength * 3;
		if ($rawBits > $maxRawBits) {
			trigger_error('encode_id(): $rawBits must be no more than 3 times greater than $encodedLength');
			return false;
		}
		if ($key === null) {
			$key = generate_xor_key($encodedLength);
		}
		$result = array_fill(0, $encodedLength, 0x30);
		for ($position = 0; $position < $rawBits; $position++) {
			$bit = (($id >> $position) & 0x01) << floor($position / $encodedLength);
			$index = $position % $encodedLength;
			$result[$index] |= $bit;
		}
		for (; $position < $maxRawBits; $position++) {
			$index = $position % $encodedLength;
			$bit = ($position % 2) << floor($position / $encodedLength);
			$result[$index] |= $bit;
		}
		return implode('', array_map('chr', $result)) ^ $key;
	}
}

if(!function_exists('decode_id')){
	function decode_id($id, $encodedLength = 16, $rawBits = 16, $key = null){
		if ($key === null) {
			$key = generate_xor_key($encodedLength);
		}
		$bytes = array_map('ord',str_split(str_pad($id, $encodedLength, '0', STR_PAD_LEFT) ^ $key,	1));
		$result = 0;
		for ($position = 0; $position < $rawBits; $position++) {
			$index = $position % $encodedLength;
			$bit = (($bytes[$index] >> floor($position / $encodedLength)) & 0x01) << $position;
			$result |= $bit;
		}
		return $result;
	}
}

// for image upload concept......

if(!function_exists('image_upload')){
	function image_upload($source=false) {
		$mahindra = & get_instance();
		//pr($source); die;
		$config['upload_path'] = $source['upload_path'];
        $config['allowed_types'] = $source['allowed_types'];
        $config['file_name'] = time() . date('Ymd');

        $mahindra->load->library('upload', $config);

        if (!$mahindra->upload->do_upload($source['file_name'])) {
			
            $error = (object) array('error' => $mahindra->upload->display_errors('<span class="error">', '</span>'));
            $mahindra->data['error'] = $error->error;
            return $mahindra;
        } else {  
            $data = (object) array('upload_data' => $mahindra->upload->data());
        //for thumb
			if($source['thumb_path']){
					$configImageResize = array(
					'source_image' => $config['upload_path'] . $data->upload_data['file_name'],
					'new_image' => $source['thumb_path'],
					'maintain_ratio' => true,
					'width' => 250,
					'height' => 200
				);
				$mahindra->load->library('image_lib');
				$mahindra->image_lib->initialize($configImageResize);
				$mahindra->image_lib->resize();
				$mahindra->image_lib->clear();
			}
        }
        return $data;
    }
}
?>