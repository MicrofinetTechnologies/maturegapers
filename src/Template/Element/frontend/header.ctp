<div class="header-main">
    <div class="fixrd-menu">
        <div class="logo-2">
            <a href="<?= HTTP_ROOT; ?>"><img src="<?php echo HTTP_ROOT . SOCIAL_ICON . '/' . $siteDetails->logo; ?>" alt=""></a>
        </div>
        <div class="menu-2">
            <label class="lab" for="menu-toggle2"><p><img src="<?php echo HTTP_ROOT; ?>frontend/images/menu-toggle.png" alt=""></p></label>
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
                    <label class="lab" for="search-toggle"><p><img src="<?php echo HTTP_ROOT; ?>frontend/images/search.png" alt=""></p></label>
                    <?= $this->Form->create(null, ['type' => 'get', 'url' => '/search']); ?>
                    <input type="text" placeholder="search here.." name="key">
                    <input type="submit" value="">
                    <?= $this->Form->end(); ?>
                </li>
                <li><a href="<?=HTTP_ROOT;?>members"><span>Members</span></a></li>
                <li><a href="<?= HTTP_ROOT; ?>joinus"><span>Join Now</span></a></li>
            </ul>
        </div>
    </div>
    <div class="header" style="margin-top: 0;">
        <div class="logo-2">
            <a href="<?= HTTP_ROOT; ?>"><img src="<?php echo HTTP_ROOT . SOCIAL_ICON . '/' . $siteDetails->logo; ?>" alt=""></a>
        </div>
        <div class="menu-2">
            <label for="menu-toggle"><p><img src="<?php echo HTTP_ROOT; ?>frontend/images/menu-toggle.png" alt=""></p></label>
            <input type="checkbox" id="menu-toggle">
            <ul id="menu">
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
                    <label class="lab" for="search-toggle2"><p><img src="<?php echo HTTP_ROOT; ?>frontend/images/search.png" alt=""></p></label>

                    <?= $this->Form->create(null, ['type' => 'get', 'url' => '/search']); ?>
                    <input type="text" placeholder="search here.." name="key">
                    <input type="submit" value="">
                    <?= $this->Form->end(); ?>
                </li>
                <li><a href="<?=HTTP_ROOT;?>members"><span>Members</span></a></li>
                <li><a href="<?= HTTP_ROOT; ?>joinus"><span>Join Now</span></a></li>

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
</script>