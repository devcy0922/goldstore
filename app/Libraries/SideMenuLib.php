<?php
namespace App\Libraries;

class SideMenuLib
{
    public static function leftMenu()
    {
        $leftMenuList = [];

        $leftMenuList[] = [
            "titleName" => "Main",
            "iconClass" => "bi bi-grid-fill",
            "defaultURL" => "/main",
            "list" => []
        ];

        $leftMenuList[] = [
            "titleName" => "공지사항",
            "iconClass" => "bi bi-stack",
            "defaultURL" => "/notice",
            "list" => []
        ];


        $leftMenuList[] = [
            "titleName" => "실시간 현황",
            "iconClass" => "bi bi-grid-1x2-fill",
            "defaultURL" => "/report",
            "list" => [
                [
                    "locationURL" => "/recentDetection",
                    "titleName" => "탐지 현황",
                ],
                [
                    "locationURL" => "/recentReport",
                    "titleName" => "신고 현황",
                ],

            ]
        ];

        $leftMenuList[] = [
            "titleName" => "통계",
            "iconClass" => "bi bi-grid-1x2-fill",
            "defaultURL" => "/statistics",
            "list" => []
        ];

        $leftMenuList[] = [
            "titleName" => "logout",
            "iconClass" => "",
            "defaultURL" => "/member/logout",
            "list" => []
        ];

        return $leftMenuList;
    }
}