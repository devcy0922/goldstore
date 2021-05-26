<?php

namespace App\Controllers;

use App\Models\BbsModel;

class Notice extends BaseController
{
    public function index()
    {
        $BbsModel = new BbsModel();
        $result = $BbsModel->find();

        $data['bbsList'] = $result;

        return $this->render->view('notice/list', $data);
    }

    public function view($bbsId = 0)
    {
        $BbsModel = new BbsModel();
        $result = $BbsModel->find($bbsId);
        if (empty($result)) {

        }

        $data['bbsRow'] = $result;

        return $this->render->view('notice/view', $data);
    }


    public function bbsRegistProc()
    {

        $id = $_POST['id'] ?? 0;
        $contents = $_POST['contents'] ?? "";

        $BbsModel = new BbsModel();
        $bbsRow = $BbsModel->find($id);


        if( !$bbsRow ){
            printJson(false, [], "해당 게시글이 없습니다.");
        }

        $result = $BbsModel->update($id, [
            "bbs_contents" => addslashes($contents)
        ]);

        printJson($result, []);
    }

}
