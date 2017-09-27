<template>
  <nav class="navbar-fixed-top" :class='["navbar",atindex_class]'>
    <div class='container'>
      <div class='navbar-header'>
        <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
          <span class='sr-only'>Toggle navigation</span>
          <span class='icon-bar'></span>
          <span class='icon-bar'></span>
          <span class='icon-bar'></span>
        </button>
        <router-link class='navbar-brand' to='/'>Dyverse Studio</router-link>
      </div>
      <div class='collapse navbar-collapse navbar-right' id='bs-example-navbar-collapse-1'>
        <ul class='nav navbar-nav'>
          <li>
            <router-link to='/service'>Service</router-link>
          </li>
          <li>
            <router-link to='/works'>Works</router-link>
          </li>
          <li>
            <router-link to='/artist'>Artist</router-link>
          </li>
          <li>
            <router-link to='/blog'>Blog</router-link>
          </li>
          <li>
            <router-link to='/contact'>Contact</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  props: ["sw_page", "nowpage","atindex_class"]
  
}
</script>