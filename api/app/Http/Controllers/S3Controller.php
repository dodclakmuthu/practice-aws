<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\S3\S3Client;
use Exception;
use Illuminate\Support\Facades\Log;

class S3Controller extends Controller
{

  public function index(Request $request)
  {
    try {
      if (!$request->has('fileName')) {
        return response()->json([
          'status' => 'error',
          'message' => "File name required!"
        ], 400);
      }
      $filename = $request->query('fileName');
      $s3 = new S3Client([
        'version' => 'latest',
        'region'  => 'us-east-1'
      ]);
      $cmd = $s3->getCommand('PutObject', [
        'Bucket' => 'vue-laravel-test-chamath',
        'Key' => $filename,
        'MetaData' => []
      ]);
      $request = $s3->createPresignedRequest($cmd, '+20 minutes');
      $presignedUrl = (string)$request->getUri();
      return response()->json([
        'status' => 'ok',
        'url' => $presignedUrl
      ]);
    } catch (Exception $e) {
      return response()->json([
        'status' => 'error',
        'message' => "Internal server Error!"
      ], 500);
    }
  }
}
