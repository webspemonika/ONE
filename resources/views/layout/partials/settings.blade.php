<div class="fixed-plugin">
    <a class="px-3 py-2 fixed-plugin-button text-dark position-fixed">
        <i class="py-2 material-icons">settings</i>
    </a>
    <div class="shadow-lg card">
        <div class="pt-3 pb-0 card-header">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="mt-4 float-end">
                <button class="p-0 btn btn-link text-dark fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="my-1 horizontal dark">
        <div class="pt-0 card-body pt-sm-3">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="my-2 badge-colors text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger"
                        onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="px-3 mb-2 btn bg-gradient-dark active" data-class="bg-gradient-dark"
                    onclick="sidebarType(this)">Dark</button>
                <button class="px-3 mb-2 btn bg-gradient-dark ms-2" data-class="bg-transparent"
                    onclick="sidebarType(this)">Transparent</button>
                <button class="px-3 mb-2 btn bg-gradient-dark ms-2" data-class="bg-white"
                    onclick="sidebarType(this)">White</button>
            </div>
            <p class="mt-2 text-sm d-xl-none d-block">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="my-auto form-check form-switch ps-0 ms-auto">
                    <input class="mt-1 form-check-input ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="my-3 horizontal dark">
            <div class="mt-2 d-flex">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="my-auto form-check form-switch ps-0 ms-auto">
                    <input class="mt-1 form-check-input ms-auto" type="checkbox" id="dark-version"
                        onclick="darkMode(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn btn-outline-dark w-100" href="">View documentation</a>
            <div class="text-center w-100">
                <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
                    data-icon="octicon-star" data-size="large" data-show-count="true"
                    aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
                    class="mb-0 btn btn-dark me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard"
                    class="mb-0 btn btn-dark me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>
