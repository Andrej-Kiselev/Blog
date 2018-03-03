!!!
%html
    %head
        %title Сайт
        %meta{:charset => "utf-8"}/
        %link{:href => asset('/css/bootstrap.css'), :rel => "stylesheet", :type => "text/css"}/
        %link{:href => asset('/css/trps.css'), :rel => "stylesheet", :type => "text/css"}/
        %script{:src => asset('/jscript/jq.js'), :type => "text/javascript"}
        %script{:src => asset('/jscript/scripts.js'), :type => "text/javascript"}
        %meta{:content => "", :name => "csrf-token"}/

    %div.nav.navbar.navbar-light.bg-faded.navbar-fixed-top(style="background-color: #282B34; border-bottom: 1px solid black; margin: 0; padding: 0")
        #navBarL.container{:style => "padding: 0"}
            %ul.nav.navbar-nav
                %li
                    %a{:href => "/"} Главная
                    %li
                        %a{:href => "/blog"} Блог
                    %li
                        %a{:href => "/checks"} Учёба
                    %li
                        %a{:href => "/vk"} Посты из ВК
                    %li
                        %a{:href => "/contacts"} Контакты
                    %li
                        %a{:href => "/photo"} Фотоальбом
    %body#mainDiv
        @yield('hamView')