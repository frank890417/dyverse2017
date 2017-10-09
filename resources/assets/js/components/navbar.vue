<template lang="pug">
nav.navbar-fixed-top.navbar(:class="{at_index: $route.path=='/'}")
  .container
    .navbar-header
      button.navbar-toggle.collapsed(type='button', data-toggle='collapse', data-target='#bs-example-navbar-collapse-1', aria-expanded='false')
        span.sr-only Toggle navigation
        span.icon-bar
        span.icon-bar
        span.icon-bar
      router-link.navbar-brand(to='/') Dyverse Studio
    #bs-example-navbar-collapse-1.collapse.navbar-collapse.navbar-right
      ul.nav.navbar-nav
        li(v-for="route in routes")
          router-link.nav-right-item(:to="route.to") {{route.tag}}
</template>

<script>
export default {
  props: ["sw_page", "nowpage","atindex_class"],
  data() {
    return {
      routes: [
        {tag: "Service" , to: "/service"},
        {tag: "Works" , to: "/works"},
        {tag: "Artist" , to: "/artist"},
        {tag: "Blog" , to: "/blog"},
        {tag: "Contact" , to: "/contact"},
      ]
    }
  }
}
</script>

