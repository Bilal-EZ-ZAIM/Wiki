<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="home" class="nav-link px-2 text-secondary">Home</a></li>
                <?php if ($_SESSION['id'] != null) {
                    echo "<li><a href='profile' class='nav-link px-2 text-white'>profile</a></li>";
                }
                ;
                ?>

            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..."
                    aria-label="Search">
            </form>

            <div class="text-end">
                <?php if ($_SESSION['id'] == null) {
                    echo "<a href='login' type='button' class='btn btn-outline-light me-2'> Login </a>
                    <a href='Signup' type='button' class='btn btn-warning'>Sign-up</a>";
                }
                ?>
                
                <?php if ($_SESSION['role_id'] == 2) {
                    echo "<a href='dashbord' type='button' class='btn btn-outline-light me-2'> Dashbord admin </a>";
                }
                ?>
            </div>
        </div>
    </div>
</header>