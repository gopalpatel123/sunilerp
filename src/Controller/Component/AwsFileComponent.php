<?php
namespace App\Controller\Component;
use App\Controller\AppController;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
require_once(ROOT . DS  .'vendor' . DS  .  'autoload.php');
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
class AwsFileComponent extends Component
{
	function initialize(array $config) 
	{
		parent::initialize($config);
		
	}
	
	/*     Connect to AWS S3   */
	function awsAccess()
	{
		$this->AwsFiles = TableRegistry::get('AwsFiles');
		$AwsFiles=$this->AwsFiles->get(1);
		//pr($AwsFiles); exit;
		$this->bucketName=$AwsFiles->bucket_name;  // Bucket Name
		$this->cdnpath=$AwsFiles->cdn_path;  // CDN 
		$this->awsAccessKey=$AwsFiles->access_key; // Access Key
		$this->awsSecretAccessKey=$AwsFiles->secret_access_key;  // Secret Access key
	}
	function configuration()
	{
		$this->awsAccess();
		$config = [
					'region'  => 'ap-south-1',
					'version' => 'latest',
					'credentials' => [
						'key'    => $this->awsAccessKey,
						'secret' => $this->awsSecretAccessKey
					],
					'options' => [
					'scheme' => 'http',
					],
					'http'    => [
						'verify' => ROOT . DS  .'vendor' . DS . 'composer' . DS . 'ca-bundle' . DS . 'res' . DS . 'cacert.pem'
					]
				]; 

		return $this->s3Client = new S3Client($config);
	}
	
	/*  Store Image on s3             */
	function putObjectFile($keyname,$sourceFile,$contentType)
	{		
		$this->configuration();
		$this->s3Client->putObject(array(
			'Bucket' => $this->bucketName,
			'Key'    => $keyname,
			'SourceFile'   => $sourceFile,
			'ContentType'  => $contentType,
			'ContentDisposition' => 'inline',
			'ACL'          => 'public-read',
			'StorageClass' => 'REDUCED_REDUNDANCY'
		));
	}
	
	/*  Store PDF on s3             */
	function putObjectPdf($keyname,$body,$contentType)
	{				
		$this->configuration();
		$this->s3Client->putObject(array(
			'Bucket' => $this->bucketName,
			'Key'    => $keyname,
			'Body'   => $body,
			'ContentType'  => $contentType,
			'ContentDisposition' => 'inline',
			'ACL'          => 'public-read',
			'StorageClass' => 'REDUCED_REDUNDANCY'
		));
	}
	
	/*  Delete file on s3             */
	function deleteObjectFile($keyname)
	{		
		$this->configuration();
		$this->s3Client->deleteObject(array(
			'Bucket' => $this->bucketName,
			'Key'    => $keyname
		));
	}
	
	/*  Delete Folder on s3             */
	function deleteMatchingObjects($keyname)
	{		
		$this->configuration();
		$this->s3Client->deleteMatchingObjects($this->bucketName,$keyname);
	}
	
	/*  Get object of image/pdf etc. from s3             */
	function getObjectFile($keyname)
	{			
		$this->configuration();
		$result = $this->s3Client->getObject(array(
			'Bucket' => $this->bucketName,
			'Key'    => $keyname
		));
		return $result;
	}
	
	function getObjectUrl($keyname)
	{	
		$this->configuration();
		$cmd = $this->s3Client->getCommand('GetObject', [
			'Bucket' => $this->bucketName,
			'Key'    => $keyname
		]);

		$request = $this->s3Client->createPresignedRequest($cmd, '+5 minutes');

		// Get the actual presigned-url
		return $presignedUrl = (string) $request->getUri();
	
	}
	
	/*  File exist or not on s3             */
	function doesObjectExistFile($keyname)
	{
		$this->configuration();
		$result = $this->s3Client->doesObjectExist($this->bucketName, $keyname);
		
		//pr($result);
		
		return $result;
	}
	
	/*  Get File on s3             */
	function getIterator($keyname)
	{
		$this->configuration();
		$this->s3Client->registerStreamWrapper();
		$objects = $this->s3Client->getIterator('ListObjects', array(
			'Bucket' => $this->bucketName,
			'Prefix'    => $keyname
			));
		
		//pr($result);
		
		return $objects;
	}
	
	function cdnpath(){
		$this->awsAccess();
		return $this->cdnpath ;
	}
}
?>