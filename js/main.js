var app = angular.module('myApp', [
  'ngRoute', 'ngMap', 'ngAnimate'
]);

/**
* Configure the Routes
*/
app.config(['$routeProvider', function ($routeProvider) {
    $routeProvider
    // Home
    .when("/", { templateUrl: "partials/home.html", controller: "PageCtrl" })

    // Pages
    .when("/work", { templateUrl: "partials/work.html", controller: "PageCtrl" })

    .when("/experiences", { templateUrl: "partials/experiences.html", controller: "PageCtrl" })
    .when("/contact", { templateUrl: "partials/contact.html", controller: "PageCtrl" })

    // else 404
    .otherwise("/404", { templateUrl: "partials/404.html", controller: "PageCtrl" });
} ]);


app.controller('PageCtrl', function ( $scope/*, $location, $http */) {
    $scope.pageClass = 'page-effect';

});

app.controller("dataImagesWork", function ($scope) {
    $scope.images_work = [
          { num: 1, category: 'WEBSITES', src: "1.png", description: 'My old Website. Received several Wotd nominations and 1 Wotd Award. ', url_details: "brunofeijao.html" },
          { num: 2, category: 'WEBSITES', src: "2.png", description: 'Portuguese website of Purina Gourmet. Totally redesigned from the ground up.', url_details: "purina.html" },
          { num: 3, category: 'WEBSITES', src: "3.png", description: 'website for a speech therapy clinic called "Sons para crescer".', url_details: "sonsparacrescer.html" },
          { num: 4, category: 'PERSONAL PROJECTS', src: "4.png", description: 'My first project for my web developer course. This was the front-end project of the course.', url_details: "opinatus.html" },
          { num: 5, category: 'PERSONAL PROJECTS', src: "5.png", description: 'My second project for my web developer course. This was the back-end project of the course.', url_details: "eopinatus.html" },
          { num: 6, category: 'FACEBOOK', src: "6.png", description: 'A facebook app for the vintage vans of Volkswagen', url_details: "vintagevans.html" },
          { num: 7, category: 'FACEBOOK', src: "7.png", description: 'A facebook app for the "NOS ALIVE2015" summer fest', url_details: "nosalive.html" },
          { num: 8, category: 'WEBSITES', src: "8.png", description: 'website for the summer contest by Friskies', url_details: "friskies.html" },
          { num: 9, category: 'LANDING PAGES', src: "9.png", description: 'A landing page for the "Vintage Vans" fest by Volkswagen', url_details: "vwfest.html"},
          { num: 10, category: 'WEBSITES', src: "10.png", description: 'website for the "Nestlé Moms"', url_details: "maesnestle.html" },
          { num: 11, category: 'WEBSITES', src: "11.png", description: 'Coming soon', url_details: "../index.html" },
    ];
});


//'use strict';
app.directive('autoActive', ['$location', function ($location) {
    return {
        restrict: 'A',
        scope: false,
        link: function (scope, element) {
            function setActive() {
                var path = $location.path();
                if (path) {
                    angular.forEach(element.find('li'), function (li) {
                        var anchor = li.querySelector('a');
                        if (anchor.href.match('#' + path + '(?=\\?|$)')) {
                            angular.element(li).addClass('current');
                        } else {
                            angular.element(li).removeClass('current');
                        }
                    });
                }
            }

            setActive();

            scope.$on('$locationChangeSuccess', setActive);
        }
    };
} ]);
