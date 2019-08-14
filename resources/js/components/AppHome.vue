<template>
        <div>
            <app-navbar></app-navbar>

            <h1>Home</h1>

            <app-footer></app-footer>
        </div>
</template>


<script>

import Navbar from './shared/Navbar'
import Footer from './shared/Footer'

export default {
    components:{
        'app-navbar': Navbar,
        'app-footer': Footer

    }
}
</script>

<style>

</style>
