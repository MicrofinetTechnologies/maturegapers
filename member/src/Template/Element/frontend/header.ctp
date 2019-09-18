<div class="header-main">
    <div class="fixrd-menu">
        <div class="logo-2">
            <a href="<?= HTTP_ROOT; ?>"><img src="<?php echo HTTP_REMOTE . SOCIAL_ICON . '/' . $siteDetails->logo; ?>" alt=""></a>
        </div>
        <div class="menu-2">
            <label class="lab" for="menu-toggle2"><p><img src="<?php echo HTTP_REMOTE; ?>frontend/images/menu-toggle.png" alt=""></p></label>
            <input type="checkbox" id="menu-toggle2">
            <ul id="menu2">
                <li><a href="<?= HTTP_ROOT; ?>"><i class="fas fa-home"></i></a></li>
                <li><a href="<?= HTTP_ROOT; ?>scenes">Scenes</a></li>
                <li><a href="<?= HTTP_ROOT; ?>models">Models</a></li> 
                <li><a href="<?= HTTP_ROOT; ?>our-sites">Our Sites</a></li>
				<li><a id="url" href="#" rel="sidebar" title="<?= HTTP_ROOT; ?>">Bookmark Site</a></li>
				<li class="last-li"><a href="<?= HTTP_ROOT; ?>joinus">Become a Member</a></li>
				<li class="last-li"><a href="<?=HTTP_ROOT;?>members">Members Login</a></li>
            </ul>
        </div>
        <div class="right-top">
            <ul>
                <li>
                    <label class="lab" for="search-toggle2"><p><img src="<?php echo HTTP_REMOTE; ?>frontend/images/search.png" alt=""></p></label>
                    <?= $this->Form->create(null, ['type' => 'get', 'url' => '/search']); ?>
                    <input type="text" placeholder="search here.." name="key">
                    <input type="submit" value="">
                    <?= $this->Form->end(); ?>
                </li>
                <li class="logout_diz"><a href="<?=HTTP_ROOT;?>users/logout"> Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="header" style="margin-top: 0;">
        <div class="logo-2">
            <a href="<?= HTTP_ROOT; ?>"><img src="<?php echo HTTP_REMOTE . SOCIAL_ICON . '/' . $siteDetails->logo; ?>" alt=""></a>
        </div>
        <div class="menu-2">
            <label for="menu-toggle"><p><img src="<?php echo HTTP_REMOTE; ?>frontend/images/menu-toggle.png" alt=""></p></label>
            <input type="checkbox" id="menu-toggle">
            <ul id="menu">
                <li><a href="<?= HTTP_ROOT; ?>"><i class="fas fa-home"></i></a></li>
                <li><a href="<?= HTTP_ROOT; ?>scenes">Scenes</a></li>
                <li><a href="<?= HTTP_ROOT; ?>models">Models</a></li>
                <li><a href="<?= HTTP_ROOT; ?>our-sites">Our Sites</a></li>
				<li><a  id="bookmarkme" href="javascript:void(0);" rel="sidebar" title="bookmark this page">Bookmark Site</a></li>
				<li class="last-li"><a href="<?= HTTP_ROOT; ?>joinus">Become a Member</a></li>
				<li class="last-li"><a href="<?=HTTP_ROOT;?>members">Members Login</a></li>
            </ul>
        </div>
        <div class="right-top">
            <ul>
                <li>
                    <label class="lab" for="search-toggle2"><p><img src="<?php echo HTTP_REMOTE; ?>frontend/images/search.png" alt=""></p></label>
                    <?= $this->Form->create(null, ['type' => 'get', 'url' => '/search']); ?>
                    <input type="text" placeholder="search here.." name="key">
                    <input type="submit" value="">
                    <?= $this->Form->end(); ?>
                </li>
                <li class="logout_diz"><a href="<?=HTTP_ROOT;?>users/logout"> Logout</a></li>

            </ul>
        </div>
    </div>
</div>
<div class="phone-search-box">
    <?= $this->Form->create(null, ['type' => 'get', 'url' => '/search']); ?>
    <input type="text" placeholder="search here.." name="key" id="search_text_mod">
    <input type="submit" value="">
    <?= $this->Form->end(); ?>
</div>
<script>
    $(function() {
        $("#bookmarkme").click(function() {
            // Mozilla Firefox Bookmark
            if ('sidebar' in window && 'addPanel' in window.sidebar) { 
                window.sidebar.addPanel(location.href,document.title,"");
            } else if( /*@cc_on!@*/false) { // IE Favorite
                window.external.AddFavorite(location.href,document.title); 
            } else { // webkit - safari/chrome
                alert('You can add this page to your bookmarks by pressing ' + (navigator.userAgent.toLowerCase().indexOf('mac') != - 1 ? 'Command/Cmd' : 'CTRL') + ' + D on your keyboard.');
            }
        });
    });

/*
    var triggerBookmark = $('a#url');
    triggerBookmark.click(function () {

        if (window.sidebar && window.sidebar.addPanel) { // Firefox <23

            window.sidebar.addPanel(document.title, window.location.href, '');

        } else if (window.external && ('AddFavorite' in window.external)) {

            window.external.AddFavorite(location.href, document.title);

        } else if (window.opera && window.print || window.sidebar && !(window.sidebar instanceof Node)) {
            triggerBookmark.attr('rel', 'sidebar').attr('title', document.title).attr('href', window.location.href);
            return true;

        } else {

            alert('You can add this page to your bookmarks by pressing ' + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL') + ' + D on your keyboard.');

        }

        return false;
    });
    */
</script>