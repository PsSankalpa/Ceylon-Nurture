<?php
class products extends Model
{

	protected $allowedcolumns = [
		'productName',
		'productPrice',
		'description',
		'image',
		'category',
		'sellerName',
		'address',
		'tpNumber',
		'sellerid',
	];
	protected $table = "products";
	protected $pk = "productid";
	protected $pk2 = "sellerid";

	public function validate($DATA, $FILES,$UName)
	{
		//-------------------------------------------------------------------------------------------------------------------------------------
		//for product
		$this->errors2 = array();
		// print_r($DATA);
		// print_r($FILES);
		//for product name
		if (empty($DATA['productName'])) {
			$this->errors2['productName'] = "Cannot Keep Product name empty";
		} elseif (!preg_match('/^[a-zA-Z\s]+$/', $DATA['productName'])) {
			$this->errors2['productName'] = "Only letters allowed in the product name";
		}

		//for product price
		if (empty($DATA['productPrice'])) {
			$this->errors2['productPrice'] = "Cannot Keep product price empty";
		} elseif (!preg_match('/^[0-9]+$/', $DATA['productPrice'])) {
			$this->errors2['productPrice'] = "Only numbers allowed in the product price";
		}

		//for product description
		if (empty($DATA['description'])) {
			$this->errors2['description'] = "Cannot Keep description empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;:?\-()\'?,;\\""]+$/', $DATA['description'])) {
			$this->errors2['description'] = "Only letters allowed in the description";
		}

		if (empty($DATA['category'])) {
			$this->errors2['category'] = "Cannot Keep Product category empty";
		} elseif (!preg_match('/^[a-zA-Z\s]+$/', $DATA['category'])) {
			$this->errors2['category'] = "Only letters allowed in the product category";
		}

		//for image

		if ($FILES['image']['size'] == 0) {
			$this->errors2['image'] = "Cannot keep image empty";
		} else {
			//upload the file to following dir
			$folder = "seller_products/";
			if (!file_exists($folder)) //if dir doesn't exist,create it like below with file permissions
			{
				mkdir($folder, 0777, true);
			}

			$temp = explode("-", $FILES['image']['name']);
			$newfilename = $UName . '-' . end($temp);

			//create the destination 
			$destination = $folder . $newfilename;

			$imageFileType = strtolower(pathinfo($destination, PATHINFO_EXTENSION));
			$uploadOk = 1;
			$results = $this->images($FILES, $destination, $imageFileType, $uploadOk);
			if (!empty($results)) {
				$this->errors2['image'] = $results;
			} else {
				$seller = new seller();
				$seller->get_destination($destination); //send the address of the file path to seller controller to save in the database 
			}
		}

		if (count($this->errors2) == 0) {
			move_uploaded_file($FILES['image']['tmp_name'], $destination);
			return true;
		}
		return false;
	}

	public function validate2($DATA, $FILES,$UName, $productid,$dest)
	{
		//-------------------------------------------------------------------------------------------------------------------------------------
		//for product
		$this->errors2 = array();
		// print_r($DATA);
		// print_r($FILES);
		//for product name
		if (empty($DATA['productName'])) {
			$this->errors2['productName'] = "Cannot Keep Product name empty";
		} elseif (!preg_match('/^[a-zA-Z\s]+$/', $DATA['productName'])) {
			$this->errors2['productName'] = "Only letters allowed in the product name";
		}

		//for product description
		if (empty($DATA['description'])) {
			$this->errors2['description'] = "Cannot Keep description empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;:?\-()\'?,;\\""]+$/', $DATA['description'])) {
			$this->errors2['description'] = "Only letters allowed in the description";
		}

		if (empty($DATA['category'])) {
			$this->errors2['category'] = "Cannot Keep Product category empty";
		} elseif (!preg_match('/^[a-zA-Z\s]+$/', $DATA['category'])) {
			$this->errors2['category'] = "Only letters allowed in the product category";
		}

		//for image

		if ($FILES['image']['size'] == 0) {
			$seller = new seller();
			$seller->get_destination($dest);

			if (count($this->errors) == 0) {
				return true;
			}
		} else {
			//upload the file to following dir
			$folder = "seller_products/";
			if (!file_exists($folder)) //if dir doesn't exist,create it like below with file permissions
			{
				mkdir($folder, 0777, true);
			}

			//renaming the image with a username which doctor uploads
			$row = $this->where('productid', $productid); //in here row is an array
			if ($row) {
				$row = $row[0];
				if (file_exists($row->image)) {
					unlink($row->image);
				}
			}

			$temp = explode("-", $FILES['image']['name']);
			$newfilename = $UName . '-' . end($temp);

			//create the destination 
			$destination = $folder . $newfilename;
			
			$imageFileType = strtolower(pathinfo($destination, PATHINFO_EXTENSION));
			$uploadOk = 1;
			$results = $this->images($FILES, $destination, $imageFileType, $uploadOk);
			if (!empty($results)) {
				$this->errors2['image'] = $results;
			} else {
				$seller = new seller();
				$seller->get_destination($destination); //send the address of the file path to seller controller to save in the database 
			}

			if (count($this->errors2) == 0) {
				move_uploaded_file($FILES['image']['tmp_name'], $destination);
				return true;
			}
			
		}

		return false;
	}
}
