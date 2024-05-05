<li class="dropdown" id="header_inbox_bar">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <i class="fa fa-envelope"></i>
					<span class="badge">
						 2
					</span>
    </a>
    <ul class="dropdown-menu extended inbox">
        <li>
            <p>
                You have 2 new messages
            </p>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: 250px;">
                <li>
                    <a href="#">
                        <span class="photo">
                            <img src="{{ $currentUser->avatar->url('avatar_small') }}" alt=""/>
                        </span>
                        <span class="subject">
                            <span class="from">
                                Pachange
                            </span>
                            <span class="time">
                                 Just Now
                            </span>
                        </span>
                        <span class="message">
                             Your book request completed successfully
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo">
                            <img src="{{ $currentUser->avatar->url('avatar_small') }}" alt=""/>
                        </span>
                        <span class="subject">
                            <span class="from">
                                Kapte K.G.
                            </span>
                            <span class="time">
                                 16 mins ago
                            </span>
                        </span>
                        <span class="message">
                             Testing beta site
                        </span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</li>