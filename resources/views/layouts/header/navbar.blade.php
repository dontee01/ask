<div class="navbar navbar-default">
    <div class="container">
      <!-- header -->
      <div class="navbar-header">
        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- logo -->
        <a href="{{ url('/') }}" class="navbar-brand"><img class="img-responsive" alt="" src="images/logo.png"></a>
        <!-- search form -->
        
        <!-- header end -->
        <!-- header end -->
      </div>
      <!-- navigation menu -->
      <div class="navbar-collapse collapse">
        <!-- right bar -->
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden-sm"><a href="{{ url('how-to') }}">How  It Works</a>
          </li>
          <li><a href="{{ url('questions') }}">Browse Questions</a>
          </li>
          <!-- <li class="dropdown"> <a class="dropdown-toggle " data-hover="dropdown" data-toggle="dropdown" data-animations="fadeInUp">Pages <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{ url('') }}">Home </a>
              </li>
              <li><a href="question-detial.html">Question Detail</a>
              </li>
              <li><a href="blog.html">Blog</a>
              </li>
              <li><a href="404.html">Error Page</a>
							</li>
              <li><a href="contact.html">Contact Us</a>
              </li>
            </ul>
          </li> -->
          <li>
            <div class="btn-nav"><a href="{{ url('ask') }}" class="btn btn-primary btn-small navbar-btn">Ask Question</a>
            </div>
          </li>
        </ul>
      </div>
      <!-- navigation menu end -->
      <!--/.navbar-collapse -->
    </div>
  </div>