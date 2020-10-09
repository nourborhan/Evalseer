


/*=============================================================
    Authour URI: www.binarycart.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */


(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {
            /*====================================
            METIS MENU 
            ======================================*/
            $('#main-menu').metisMenu();

            /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

            /*====================================
            MORRIS BAR CHART
         ======================================*/
            Morris.Bar({
                element: 'morris-bar-chart',
                data: [{
                    y: 'Jan',
                    a: 100,
                    b: 90
                }, {
                    y: 'Feb',
                    a: 75,
                    b: 65
                }, {
                    y: 'Mar',
                    a: 50,
                    b: 40
                }, {
                    y: 'Apr',
                    a: 75,
                    b: 65
                }, {
                    y: 'May',
                    a: 50,
                    b: 40
                }, {
                    y: 'Jun',
                    a: 75,
                    b: 65
                }, {
                    y: 'Jul',
                    a: 100,
                    b: 90
                }],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Professor Access', 'Student Access'],
                hideHover: 'auto',
                resize: true
            });

            /*====================================
          MORRIS DONUT CHART
       ======================================*/
            Morris.Donut({
                element: 'morris-donut-chart',
                data: [{
                    label: "Hint Sales",
                    value: 50
                }, {
                    label: "Deadline Extent Sales",
                    value: 30
                }, {
                    label: "Reset Submission Sales",
                    value: 20
                }],
                resize: true
            });

            /*====================================
         MORRIS AREA CHART
      ======================================*/

            Morris.Area({
                element: 'morris-area-chart',
                data: [{
                    period: '2010 Q1',
                    Submitted: 2666,
                    Extended: null,
                    Graded: 2647
                }, {
                    period: '2010 Q2',
                    Submitted: 2778,
                    Extended: 2294,
                    Graded: 2441
                }, {
                    period: '2010 Q3',
                    Submitted: 4912,
                    Extended: 1969,
                    Graded: 2501
                }, {
                    period: '2010 Q4',
                    Submitted: 3767,
                    Extended: 3597,
                    Graded: 5689
                }, {
                    period: '2011 Q1',
                    Submitted: 6810,
                    Extended: 1914,
                    Graded: 2293
                }, {
                    period: '2011 Q2',
                    Submitted: 5670,
                    Extended: 4293,
                    Graded: 1881
                }, {
                    period: '2011 Q3',
                    Submitted: 4820,
                    Extended: 3795,
                    Graded: 1588
                }, {
                    period: '2011 Q4',
                    Submitted: 15073,
                    Extended: 5967,
                    Graded: 5175
                }, {
                    period: '2012 Q1',
                    Submitted: 10687,
                    Extended: 4460,
                    Graded: 2028
                }, {
                    period: '2012 Q2',
                    Submitted: 8432,
                    Extended: 5713,
                    Graded: 1791
                }],
                xkey: 'period',
                ykeys: ['Submitted', 'Extended', 'Graded'],
                labels: ['Submitted', 'Extended', 'Graded'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });

            /*====================================
    MORRIS LINE CHART
 ======================================*/
            Morris.Line({
                element: 'morris-line-chart',
                data: [{
                    y: '2006',
                    a: 100,
                    b: 90
                }, {
                    y: '2007',
                    a: 75,
                    b: 65
                }, {
                    y: '2008',
                    a: 50,
                    b: 40
                }, {
                    y: '2009',
                    a: 75,
                    b: 65
                }, {
                    y: '2010',
                    a: 50,
                    b: 40
                }, {
                    y: '2011',
                    a: 75,
                    b: 65
                }, {
                    y: '2012',
                    a: 100,
                    b: 90
                }],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Normal', 'At Risk'],
                hideHover: 'auto',
                resize: true
            });
           
     
        },

        initialization: function () {
            mainApp.main_fun();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();
    });

}(jQuery));
