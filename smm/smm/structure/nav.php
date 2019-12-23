<?

$sidebarNav = array(
    "Dashboard" => array(
        "icon" => "home",
        "pageurl" => "index.php"
    ),
    "Recipients" => array(
        "icon" => "users",
        "pageurl" => "recipients.php"
    ),
    "Groups" => array(
        "icon" => "layer-group",
        "pageurl" => "groups.php"
    ),
    "Emails" => array(
        "icon" => "envelope",
        "pageurl" => "emails.php"
    ),
    "Sender" => array(
        "icon" => "paper-plane",
        "pageurl" => "sender.php"
    ),
    "Analysis" => array(
        "icon" => "file-chart-line",
        "pageurl" => "analysis",
        "submenu" => array(
            "Email Analysis" => array(
                "icon" => "envelope-open",
                "pageurl" => "analysis-emails.php",
            ),
            "Usage" => array(
                "icon" => "chart-bar",
                "pageurl" => "analysis-usage.php"
            ),
            "Activity Logs" => array(
                "icon" => "clipboard-list",
                "pageurl" => "analysis-activity.php"
            )
        )
    ),
    "Settings" => array(
        "icon" => "cogs",
        "pageurl" => "",
        "submenu" => array(
            "General Settings" => array(
                "icon" => "cog",
                "pageurl" => "settings-general.php"
            ),
            "Custom Fields" => array(
                "icon" => "stream",
                "pageurl" => "settings-fields.php"
            ),
            "Unsubscribe Page" => array(
                "icon" => "users-cog",
                "pageurl" => "settings-unsubscribe.php",
            )
        )
    )
);

function create_sidebar_menu($menuArray, $active = "") 
{
    $html = "";
    foreach($menuArray as $navTitle => $navDetails) 
    {
        if($navDetails["submenu"]) 
        {
            if(array_key_exists($active, $navDetails["submenu"]))
            {
                $html .= '<div class="sidebar-item has-submenu open">';
            }
            else 
            {
                $html .= '<div class="sidebar-item has-submenu">';
            }
        }
        else 
        {
            if($active == $navTitle) 
            {
                $html .= '<div class="sidebar-item active">';
            } 
            else 
            {
                $html .= '<div class="sidebar-item">';
            }
        }

        if($navDetails["pageurl"] && !$navDetails["submenu"]) 
        { 
            $html .= '<a href="'.$navDetails["pageurl"].'">';
        }
        else if(array_key_exists($active, $navDetails["submenu"]))
        {
            $html .= '<a class="submenu-open">';
        }
        else 
        {
            $html .= '<a>';
        }

        $html .= '<i class="fa-fw fas fa-'.$navDetails["icon"].'"></i> <span>'.$navTitle.'</span></a>';

        if($navDetails["submenu"] && array_key_exists($active, $navDetails["submenu"]))
        { 
            $html .= '<div class="sidebar-submenu open">'.create_sidebar_menu($navDetails["submenu"], $active).'</div>';
        }
        else if($navDetails["submenu"]) 
        {
            $html .= '<div class="sidebar-submenu">'.create_sidebar_menu($navDetails["submenu"]).'</div>';
        }

        $html .= "</div>";
    }
    return $html;
}

function create_active_nav($sidebarNav, $activeNav, $additionalNav = "") 
{
    $text = "";
    if(array_key_exists($activeNav, $sidebarNav))
    {
        $text .= $activeNav;
    }
    else 
    {
        foreach($sidebarNav as $navTitle => $navDetails) 
        {
            if(is_array($navDetails["submenu"]))
            {
                if(array_key_exists($activeNav, $navDetails["submenu"]))
                {
                    $text .= $navTitle." / ".create_active_nav($navDetails["submenu"], $activeNav);
                }
            }
        }
    }
    if($additionalNav && $text)
    {
        $text .= " / ".$additionalNav;
    }
    return $text;
}

?>

<div id="sidebar">

    <div class="sidebar-item menu-toggle">
        <a><i class="fa-fw fas fa-bars"></i> <span>Menu</span></a>
    </div>

    <?= create_sidebar_menu($sidebarNav, $activeNav) ?>

</div>  

<div id="nav">

    <span id="page-active-nav"><?= create_active_nav($sidebarNav, $activeNav, $additionalNav) ?></span>

    <span id="nav-menu">
        <i class="fas fa-user-circle nav-menu-icon"></i>
        <i class="far fa-chevron-down nav-menu-toggle"></i>
        <ul id="nav-menu-drop">
            <a href="/my-account"><li>My Account</li></a>
            <a href="/my-preferences"><li>Preferences</li></a>
            <hr>
            <a href="login.php"><li>Logout</li></a>
            <div class="menu-arrow"></div>
        </ul>
    </span>

</div>

<script>
        
    $('.menu-toggle').click( function(){

        $('#sidebar').toggleClass('open');
        $('#nav').toggleClass('open');
        $('#app').toggleClass('open');

    });

    $('.sidebar-item.has-submenu a').click( function(){

        $(this).toggleClass('submenu-open')
        $(this).next('.sidebar-submenu').toggleClass('open');

    });

    $('#nav-menu').click( function(){

        $(this).toggleClass('open');
        $('#nav-menu .nav-menu-toggle').toggleClass('fa-chevron-down');
        $('#nav-menu .nav-menu-toggle').toggleClass('fa-chevron-up');

    });

</script>