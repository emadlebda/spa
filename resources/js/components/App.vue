<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Laravel
                </a>
                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        class="navbar-toggler" data-target="#navbarSupportedContent"
                        data-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <router-link :to="{ name: 'posts.index' }" active-class="active-menu"
                                         class="nav-item nav-link" exact
                            >Posts list
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'posts.create' }" active-class="active-menu"
                                         class="nav-item nav-link" exact
                            >Add new post
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <router-view></router-view>
            </div>
        </main>

    </div>
</template>
