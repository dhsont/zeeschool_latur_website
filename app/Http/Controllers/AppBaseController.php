<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Exception\HttpResponseException;
use App\Http\Controllers\ResponseManager;
use Response;

class AppBaseController extends Controller
{
    public function validateRequest($request, $rules)
    {
        $validator = $this->getValidationFactory()->make($request->all(), $rules);

        if($validator->fails())
        {
            $msg = "";

            foreach($validator->errors()->getMessages() as $field => $errorMsg)
            {
                $msg .= $errorMsg[0] . ". ";
            }

            $msg = substr($msg, 0, strlen($msg) - 1);

            throw new HttpResponseException(Response::json(ResponseManager::makeError(ERROR_CODE_VALIDATION_FAILED, $msg)));
        }
    }

    public function throwRecordNotFoundException($message, $code = 0)
    {
        throw new HttpResponseException(Response::json(ResponseManager::makeError($code, $message)));
    }
}
