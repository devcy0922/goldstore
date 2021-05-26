<?php
namespace App\Libraries;

class Render
{
    public $layout = '';
    public $sideMenu = [];
    public $bodyTitle = '';

    public $layoutParam = [];
    public $layoutOption = [];

    public $cssVer = [
//        'plantware' => '20200610.0'
        'dev' => '20200610.0'
    ];

    public $jsVer = [
        'dev' => '20200610.0'
    ];

    public function __construct()
    {
    }


    public function view(string $name, array $data = [], array $options = [])
    {

        $thisURL = $_SERVER['REQUEST_URI'];
        $thisURL = explode("?", $thisURL)[0];
        $thisURL = explode("/", $thisURL);

        $server = $_SERVER['SERVER_NAME'];
        $serverName = explode('.', $server)[0];

        $content = view($name, $data, $options);

        return view(
            $this->layout,
            [
                'sideMenu' => $this->sideMenu,
                'content' => $content,
                'thisURL' => $thisURL
            ],
            $options
        );

        $layoutParam = $this->layoutParam;
        $layoutOption = $this->layoutOption;

        $headerMenu = [];
        $leftMenu = [
            'view' => '',
            'list' => '',
        ];

        $bodyHeaderTitle = '';

        $model = new AdminMenu();
        $category1 = $model
            ->where([
                'depth' => 0,
                'use' => 'Y'
            ])
            ->orderBy('depth asc')
            ->findAll();

        // 헤더메뉴 설정
        if( $layoutOption['adminHeaderMenuType'] == true ){
            $headerMenu = $category1;
        }

        // 사이드바 메뉴 설정
        $leftMenu = MemberLib::getMemberInfo();

        if( $layoutOption['adminLeftMenuType'] ){
            switch ( $layoutOption['adminLeftMenuType'] ){

                case 'dashboard' :
                    $leftMenu['view'] = '/templates/admin/sidebarDashboard';
                    $leftMenu['list'] = [];
                    break;
                case 'menuList' :
                    $mainMenuSeq = $this->layoutParam['adminTopMenuSeq'];

                    $list = [];

                    $tmp = $model
                        ->where([
                            'parentAdminMenuSeq' => $mainMenuSeq,
                            'use' => 'Y'
                        ])
                        ->findAll();

                    foreach ( $tmp as $cate1 => $menu1 ){
                        $list[ $menu1['adminMenuSeq'] ]['row'] = $menu1;

                        $tmp = $model
                            ->where([
                                'parentAdminMenuSeq' => $menu1['adminMenuSeq'],
                                'use' => 'Y'
                            ])
                            ->findAll();

                        if( !empty($tmp) ){
                            foreach ( $tmp as $cate2 => $menu2 ){
                                $list[ $menu1['adminMenuSeq'] ]['subList'][] = $menu2;
                            }
                        }

                    }
                    $leftMenu['view'] = '/templates/admin/sidebarMenuList';
                    $leftMenu['list'] = $list;
                    break;
            }

        }

        // 컨텐츠 타이틀 체크
        if( $this->bodyTitle ){
            $bodyHeaderTitle = $this->bodyTitle;
        }

        $content = view($name, $data, $options);

        return view(
            $this->layout,
            [
                'cssFile' => $this->cssFile,
                'jsFile' => $this->jsFile,
                'cssVersion' => $this->cssVer,
                'jsVersion' => $this->jsVer,

                'serverName' => $serverName,

                'layoutParam' => $this->layoutParam,
                'layoutOption' => $this->layoutOption,

                'bodyHeaderTitle' => $bodyHeaderTitle,
                'headerMenu' => $headerMenu,
                'leftMenu' => $leftMenu,

                'content' => $content
            ],
            $options
        );
    }

    public function initialize( $config = null ){

    }
}