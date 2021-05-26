<?php
/**
* Template Name: AFPA Small Cards
*/
    get_header('board');
?>
<style>
    body.page-template-template-smallcards-php,
    body.page-template-template-smallcards-php #page{
        height:100vh;
        overflow:hidden;
    }
    
    body.page-template-template-smallcards-php .p-1{
        display:none;
    }
.desktop {
  height: 100vh;
  overflow:scroll;
}

/* ==========================================================================
    Taskbar
========================================================================== */
.taskbar {
  position: fixed;
  z-index:9999;
  bottom: 0;
  height: 43px;
  width: 100%;
  background: #004172;
}

.taskbar .icons-left {
  height: 43px;
  display: inline-block;
}

.taskbar .icons-left #start-menu, .taskbar .icons-left #tabs-windows {
  height: 43px;
  width: 48px;
  position: relative;
}

.taskbar .icons-left #start-menu i, .taskbar .icons-left #tabs-windows i {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 21px;
  color: white;
}

.taskbar .icons-left #search {
  height: 43px;
  width: 49px;
  background-image: url("https://image.noelshack.com/fichiers/2018/18/6/1525514790-698627-icon-111-search-512.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 26px 26px;
}

.taskbar .icons-left #folder {
  height: 43px;
  width: 49px;
  background-image: url("http://www.iconarchive.com/download/i98291/dakirby309/simply-styled/File-Explorer.ico");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 21px 21px;
  background-size: 24px 21px;
}

.taskbar .icons-left #chrome {
  height: 43px;
  width: 49px;
  background-image: url("https://cdn0.iconfinder.com/data/icons/jfk/512/chrome-512.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 26px 26px;
}

.taskbar .icons-left #tabs-windows {
  height: 43px;
  width: 49px;
  background-image: url("https://image.noelshack.com/fichiers/2018/18/5/1525467821-tabs.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 15px 15px;
  background-size: 23px 15px;
}

.taskbar .icons-left #tabs-windows:hover {
  height: 43px;
  width: 49px;
  background-image: url("https://image.noelshack.com/fichiers/2018/18/5/1525467821-tabs.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 15px 15px;
  background-size: 28px 15px;
}

.taskbar .icons-left a {
  display: table-cell;
  border-bottom: 2px solid transparent;
}

.taskbar .icons-left a:hover {
  background-color: rgba(255, 255, 255, 0.1) !important;
}

.taskbar .icons-left a:not(:first-child) {
  margin-left: -4px;
}

.taskbar .icons-left a.border:focus {
  border-bottom: 2px solid rgba(245, 245, 245, 0.651);
}

.taskbar .icons-left .px {
  width: 1px;
}

.taskbar .icons-left .px a {
  pointer-events: none;
}

.taskbar .icons-right {
  height: 43px;
  float: right;
}

.taskbar .icons-right #wifi {
  height: 43px;
  width: 49px;
  background-image: url("https://image.noelshack.com/fichiers/2018/18/4/1525383811-wifinotificationicon.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 16px 16px;
}

.taskbar .icons-right #sound {
  height: 43px;
  width: 49px;
  background-image: url("https://image.noelshack.com/fichiers/2018/18/4/1525383779-audiotoasticon.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 22px 22px;
}

.taskbar .icons-right #return {
  width: 4px;
  border-left: 1px solid grey;
}

.taskbar .icons-right #notifications, .taskbar .icons-right #up {
  height: 43px;
  width: 42px;
  position: relative;
}

.taskbar .icons-right #notifications i, .taskbar .icons-right #up i {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 17px;
  color: white;
}

.taskbar .icons-right .clear {
  height: 43px;
  width: 7px;
  display: table-cell;
}

.taskbar .icons-right .disabled {
  pointer-events: none;
  cursor: default;
}

.taskbar .icons-right .datetime {
  display: table-cell;
  width: 70px !important;
  cursor: pointer;
  padding-top: 3px;
}

.taskbar .icons-right .datetime span {
  display: block;
  text-align: center;
  margin-top: 5px;
  font-size: 11.3px;
  color: white;
}

.taskbar .icons-right .datetime:hover {
  background-color: rgba(255, 255, 255, 0.1) !important;
}

.taskbar .icons-right a {
  display: table-cell;
}

.taskbar .icons-right a:hover {
  background-color: rgba(255, 255, 255, 0.1) !important;
}

.taskbar .icons-right a:not(:first-child) {
  margin-left: -4px;
}

.taskbar .icons-right .small-icons {
  width: 24px !important;
}

/* ==========================================================================
    Desktop
========================================================================== */
.desktop {
  display: flex;
}

.desktop .icon-desktop {
  padding: 4px 8px 4px 8px;
  border: 2px solid transparent;
  text-align: center;
  margin-bottom: 32px;
}

.desktop .icon-desktop a {
  display: block;
  text-decoration: none;
  cursor: default;
}

.desktop .icon-desktop img {
  height: 48px;
  width: 48px;
}

.desktop .icon-desktop span {
  display: block;
  color: white;
  font-size: 11px;
  text-align: center;
}

.desktop .icon-desktop:hover {
  background: rgba(255, 255, 255, 0.1);
  border: 2px solid rgba(255, 255, 255, 0.2);
}

.desktop .icon-desktop:first-child {
  margin-top: 5px;
}

.desktop #sound-modal {
  background: #005a9e;
  position: absolute;
  right: 0;
  bottom: 43px;
  height: 100px;
  width: 380px;
  visibility: hidden;
}

.desktop #sound-modal i {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  left: -20px !important;
  color: whitesmoke;
}

.desktop #sound-modal span.data-value {
  position: absolute;
  top: 50%;
  right: -40px;
  transform: translateY(-50%);
  color: whitesmoke;
}

.desktop #sound-modal .sound-text {
  text-align: center;
  margin-top: 15px;
  color: whitesmoke;
}

.desktop #sound-modal .sound-progress {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  top: 70%;
}

.desktop #sound-modal .sound-progress .bar-sound {
  width: 230px;
  height: 5px;
  background: linear-gradient(to right, #2989d8 0%, #2989d8 50%, grey 51%, grey 51%);
}

.desktop #sound-modal .sound-progress .bar-sound-drag {
  height: 20px;
  width: 7px;
  background: #0078d7;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 3px;
}

.desktop #sound-modal:target {
  visibility: visible;
  animation-name: open-height;
  animation-duration: 0.1s;
  transition: 0.1s;
}

@keyframes open-height {
  0% {
    height: 50px;
    opacity: 0.5;
  }
  100% {
    height: 100px;
    opacity: 1;
  }
}

.desktop #sound-modal:hover .bar-sound-drag {
  background: white;
}

/* Wifi */
#wifi-modal {
  background: #005a9e;
  position: absolute;
  right: 0;
  bottom: 43px;
  height: 600px;
  width: 380px;
  color: white;
  visibility: hidden;
  display: flex;
  flex-direction: column;
}

#wifi-modal:target {
  visibility: visible !important;
  animation-name: open;
  animation-duration: 0.1s;
  transition: 0.1s;
}

@keyframes open {
  0% {
    height: 550px;
    opacity: 0.5;
  }
  100% {
    height: 600px;
    opacity: 1;
  }
}

#wifi-modal .list-networks .networks {
  padding: 20px;
  cursor: default;
}

#wifi-modal .list-networks .networks i {
  transform: rotate(45deg);
  font-size: 25px;
}

#wifi-modal .list-networks .networks:first-child {
  background: rgba(255, 255, 255, 0.1);
}

#wifi-modal .list-networks .networks:hover {
  background: rgba(255, 255, 255, 0.15);
}

#wifi-modal .list-networks .networks span.name-wifi {
  font-size: 18px;
}

#wifi-modal .list-networks .networks span.type-wifi {
  display: block;
  font-size: 15px;
  color: rgba(245, 245, 245, 0.644);
}

#wifi-modal .list-networks .networks .text-wifi {
  display: inline-block;
  position: relative;
  width: 80%;
}

#wifi-modal .list-networks .networks .icons-wifi {
  float: left;
  padding: 10px 10px 0px 0px;
  margin-right: 15px;
}

#wifi-modal .list-networks .networks .propriety {
  font-size: 15px;
  color: rgba(245, 245, 245, 0.6);
  display: block;
  margin-top: 10px;
  text-decoration: underline;
  cursor: pointer;
}

#wifi-modal .list-networks .networks .propriety:hover {
  color: rgba(245, 245, 245, 0.9);
}

#wifi-modal .list-networks .networks button {
  display: block;
  color: white;
  background: #338ed6;
  border: 2px solid transparent;
  padding-left: 40px;
  padding-right: 40px;
  padding-top: 7px;
  padding-bottom: 7px;
  font-size: 15px;
  float: right;
  margin-top: 10px;
}

#wifi-modal .list-networks .networks button:hover {
  border: 2px solid rgba(255, 255, 255, 0.63);
}

#wifi-modal .list-networks .networks button:focus {
  background: #66aae0;
  outline: none;
  border: 2px solid transparent;
}

#wifi-modal .list-networks .options-wifi {
  position: absolute;
  bottom: 0;
}

#wifi-modal .list-networks .options-wifi .options-bloc {
  display: flex;
  flex-direction: row;
}

#wifi-modal .list-networks .options-wifi .options-bloc .bloc-options {
  height: 75px;
  width: 95px;
  background: rgba(255, 255, 255, 0.1);
  margin: 10px 0px 5px 6px;
  position: relative;
  border: 2px solid transparent;
  cursor: default;
}

#wifi-modal .list-networks .options-wifi .options-bloc .bloc-options i {
  position: absolute;
  top: 10px;
  left: 5px;
}

#wifi-modal .list-networks .options-wifi .options-bloc .bloc-options span {
  display: block;
  position: absolute;
  bottom: 3px;
  left: 5px;
  font-size: 14px;
}

#wifi-modal .list-networks .options-wifi .options-bloc .bloc-options:first-child {
  background: rgba(255, 255, 255, 0.3);
}

#wifi-modal .list-networks .options-wifi .options-bloc .bloc-options:hover {
  border: 2px solid rgba(255, 255, 255, 0.63);
}

#wifi-modal .list-networks .options-wifi .options-wifi-text {
  margin-left: 6px;
}

#wifi-modal .list-networks .options-wifi .options-wifi-text span {
  display: block;
  font-size: 14px;
  color: rgba(245, 245, 245, 0.8);
}

#wifi-modal .list-networks .options-wifi .options-wifi-text span:first-child {
  text-decoration: underline;
  cursor: pointer;
}

#wifi-modal .list-networks .options-wifi .options-wifi-text span:not(:first-child) {
  font-size: 12px;
  cursor: default;
}

#start-menu-modal {
  background: #005a9e;
  position: absolute;
  left: 0;
  bottom: 43px;
  height: 600px;
  color: white;
  visibility: hidden;
  display: grid;
  grid-template-columns: 50px 250px 400px;
  cursor: default;
}

#start-menu-modal:target {
  visibility: visible !important;
  animation-name: open;
  animation-duration: 0.1s;
  transition: 0.1s;
  z-index: 9999;
}

@keyframes open {
  0% {
    height: 550px;
    opacity: 0.5;
  }
  100% {
    height: 600px;
    opacity: 1;
  }
}

#start-menu-modal #user {
  display: flex;
  flex-direction: column;
  align-items: center;
}

#start-menu-modal #user a {
  color: whitesmoke;
  height: 50px;
  width: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-decoration: none;
  cursor: default;
}

#start-menu-modal #user a:hover {
  background: rgba(255, 255, 255, 0.1);
}

#start-menu-modal #user .push {
  margin-bottom: auto;
}

#start-menu-modal #apps {
  display: flex;
  flex-direction: column;
  overflow-y: visible;
  padding: 10px;
}

#start-menu-modal #apps a {
  color: whitesmoke;
  display: flex;
  text-decoration: none;
  padding: 2px 10px 0px 20px;
  line-height: 2.5;
  font-size: 12px;
  letter-spacing: 0.5px;
  cursor: default;
}

#start-menu-modal #apps a img {
  height: 30px;
  width: 30px;
  padding: 4px;
}

#start-menu-modal #apps a img[alt="sublime"] {
  background: #292929;
}

#start-menu-modal #apps a img[alt="access"] {
  background: #7c2325;
}

#start-menu-modal #apps a i {
  font-size: 25px;
  line-height: 1.1;
}

#start-menu-modal #apps a span {
  margin-left: 8px;
  color: whitesmoke;
}

#start-menu-modal #apps a:hover {
  background: rgba(255, 255, 255, 0.1);
}

#start-menu-modal #apps a.category {
  height: 30px;
}

#start-menu-modal #others .title-others {
  color: whitesmoke;
  text-decoration: none;
  padding: 10px 10px 0px 20px;
  line-height: 2.5;
  font-size: 12px;
  letter-spacing: 0.5px;
}

#start-menu-modal #others .box-others {
  display: inline-flex;
  padding-left: 20px;
  flex-wrap: wrap;
}

#start-menu-modal #others .box-others .box {
  height: 100px;
  width: 100px;
  position: relative;
  background: #0078d7;
  margin-left: 4px;
  border: 2px solid transparent;
  margin-bottom: 4px;
}

#start-menu-modal #others .box-others .box img {
  height: 40px;
  width: 40px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

#start-menu-modal #others .box-others .box span {
  position: absolute;
  bottom: 3px;
  left: 4px;
  font-size: 12px;
}

#start-menu-modal #others .box-others .box:hover {
  border: 2px solid #7fbbeb;
}


</style>
    <!-- Taskbar -->
    <div class="taskbar">
        <div class="icons">
            <div class="icons-left">
                <a href="#start-menu-modal" id="start-menu"><i class="fa-solid fa-rocket"></i></a>
            </div>
            <div class="icons-right">
                    <div class="datetime">
                        <!-- <span class="hour">
                            23:58
                        </span>
                        <span class="date">
                            03/05/2018
                        </span> -->
                    </div>
                    <a href="#notifications" id="notifications"><i class="far fa-bell"></i></a>
                    <a href="#" class="clear disabled"></a>
                    <a href="#" id="return"></a>
            </div>
        </div>
    </div>

    <!-- Desktop -->
    <div class="desktop">

    <div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
                <div class="px-1">
                    <div class="row table_head">
                        <div class="col-sm-1">
                            <p>Small Cards</p>
                        </div>
                        <div class="col-sm-11">
                            <div class="row">     
                                <div class="col-sm-3">
                                    <p>En Preparation</p>
                                </div>
                                <div class="col-sm-3">
                                    <p>In Progress</p>
                                </div>
                                <div class="col-sm-3">
                                    <p>En Validation</p>
                                </div>
                                <div class="col-sm-3">
                                    <p>En Exploitation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  
                    $categories = get_categories();
                    foreach ($categories as $category) :
                        $cat_ID = $category->cat_ID 
                        ?>
                        <div class="row cat_row">     
                            <div class="col-sm-1 border-right border-bottom" style="background-color:#0c3d50;font-size:12px;text-transform:uppercase;font-weight:700;color:white;">
                                <?php echo $category->cat_name; ?>
                            </div>
                            <div class="col-sm-11 table_smallcards border-bottom">
                                <div class="row">
                                    <div class="align-content-start row dragdrop_container col-sm-3 border-right" data-column="en-preparation">
                                        <div style="min-height:20px; content=' ';"></div>
                                        <?php
                                            $args = array( 
                                            'posts_per_page' => -1,
                                            'cat' => $cat_ID,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'etats',
                                                    'field' => 'slug',
                                                    'terms' => 'en-preparation',
                                                )
                                            ),
                                            'orderby'          => 'modified'
                                        );
                                        $myposts = get_posts( $args );
                                        foreach ( $myposts as $post ) :
                                            displaySmallCards($post);    
                                        endforeach;   
                                            ?>
                                    </div>
                                    <div class="align-content-start row dragdrop_container col-sm-3 border-right" data-column="in-progress">
                                        <div style="min-height:20px; content=' ';"></div>
                                            <?php
                                                $args = array( 
                                            'posts_per_page' => -1,
                                            'cat' => $cat_ID,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'etats',
                                                    'field' => 'slug',
                                                    'terms' => 'in-progress',
                                                )
                                                ),
                                                'orderby'          => 'modified'
                                        );
                                        $myposts = get_posts( $args );
                                        foreach ( $myposts as $post ) :
                                            displaySmallCards($post);    
                                        endforeach;   
                                            ?>
                                    </div>
                                    <div class="align-content-start dragdrop_container col-sm-3 border-right row" data-column="en-validation">
                                        <div style="min-height:20px; content=' ';"></div>
                                            <?php
                                                $args = array( 
                                            'posts_per_page' => -1,
                                            'cat' => $cat_ID,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'etats',
                                                    'field' => 'slug',
                                                    'terms' => 'en-validation',
                                                )
                                            ),
                                            'orderby'          => 'modified'
                                        );
                                        $myposts = get_posts( $args );
                                        foreach ( $myposts as $post ) :
                                            displaySmallCards($post);    
                                        endforeach;   
                                            ?>
                                    </div>
                                    <div class="align-content-start dragdrop_container col-sm-3 border-right row" data-column="en-exploitation">
                                        <div style="min-height:20px; content=' ';"></div>
                                            <?php
                                                $args = array( 
                                            'posts_per_page' => -1,
                                            'cat' => $cat_ID,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'etats',
                                                    'field' => 'slug',
                                                    'terms' => 'en-exploitation',
                                                )
                                            ),
                                            'orderby'          => 'modified'
                                        );
                                        $myposts = get_posts( $args );
                                        foreach ( $myposts as $post ) :
                                            displaySmallCards($post);    
                                        endforeach;   
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </main>
		</div>
	</div>











    </div>

    <!-- Start menu -->
    <div id="start-menu-modal">
        <div id="user">
            <a class="push" href="#"><i class="fas fa-close"></i></a>
            <!--<a href="#"><i class="fas fa-user"></i></a>
            <a href="#"><i class="fas fa-cog"></i></a>
            <a href="#"><i class="fas fa-power-off"></i></a>
-->
        </div>
        <div id="apps">
            <a class="category" href="#">Administration</a>
            <a href="#"><img src="https://via.placeholder.com/468x60?text=Dashboard" alt="access"> <span>Dashboard</span></a>
          
            <a href="#"><img src="https://via.placeholder.com/468x60?text=SmallCards" alt="access"> <span>Small Cards</span></a>
          
            <a class="category" href="#">Communication</a>
            <a href="#"><img src="https://via.placeholder.com/468x60?text=Communication" alt="access"> <span>Communication Board</span></a>
          
            <a class="category" href="#">Sourcing</a>
            <a href="#"><img src="https://via.placeholder.com/468x60?text=Prospects" alt="access"> <span>Prospects</span></a>
        </div>
        </div>
    </div>






<?php   
    include('inc/views/modals-global.php');
    get_footer('smallcards');
?>