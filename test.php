<h1 class="logo">
          <span>DashBoard</span>
        </h1>
        <div class="nav-wrap">
          <nav class="main-nav" role="navigation">
            <ul class="unstyled list-hover-slide">
              {{-- <li><a href="/managers">Users</a></li> --}}
              <li><a  href={{ route('books.index') }}>Books</a></li>
              <li><a  href={{ route('Author.index') }}>Categories</a></li>
              <li><a  href={{ route('categories.index') }}>Authors</a></li>
            </ul>
          </nav>
        </div>