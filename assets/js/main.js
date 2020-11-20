$(function() {
    $(".table-sort").tablesorter();
    $('[data-toggle="tooltip"]').tooltip();
});
jQuery(document).ready(function(){
    $( "#loader" ).delay(100).fadeOut(100);
});  
// Analytics

if (typeof canvas_books_h !== 'undefined') {
    var ctx = document.getElementById('books_h').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        order: 1,
        // The data for our dataset
        data: {
            
            labels: canvas_books_h.labels,
            datasets: [{
                barPercentage: 0.9,
                label: canvas_books_h.datalabel,
                data: canvas_books_h.data,
                backgroundColor: ['#e53935',
                '#d81b60',
                '#8e24aa',
                '#5e35b1',
                '#3949ab',
                '#1e88e5',
                '#039be5',
                '#00acc1',
                '#00897b',
                '#43a047',
                '#c0ca33',
                '#fdd835',
                "#ffb300",
                "#fb8c00",
                "#f4511e"]

            }]
        },

        // Configuration options go here
        options: {
            aspectRatio: 1.5,
            "scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}
        }
    });
}

if (typeof canvas_categories !== 'undefined') {
    var ctx = document.getElementById('categories').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',
        order: 1,
        // The data for our dataset
        data: {
            
            labels: canvas_categories.labels,
            datasets: [{
                barPercentage: 0.9,
                label: canvas_categories.datalabel,
                data: canvas_categories.data,
                backgroundColor: ['#e53935',
                    '#d81b60',
                    '#8e24aa',
                    '#5e35b1',
                    '#3949ab',
                    '#1e88e5',
                    '#039be5',
                    '#00acc1',
                    '#00897b',
                    '#43a047',
                    '#c0ca33',
                    '#fdd835',
                    "#ffb300",
                    "#fb8c00",
                    "#f4511e"]

            }]
        },

        // Configuration options go here
        options: {
            aspectRatio: 2,
            legend: { position: "left"}
        }
    });
}


if (typeof canvas_members_books !== 'undefined') {
    var ctx = document.getElementById('members_books').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'horizontalBar',
        order: 1,
        // The data for our dataset
        data: {
            
            labels: canvas_members_books.labels,
            datasets: [{
                barPercentage: 0.9,
                label: canvas_members_books.datalabel,
                data: canvas_members_books.data,
                backgroundColor: ['#e53935',
                    '#d81b60',
                    '#8e24aa',
                    '#5e35b1',
                    '#3949ab',
                    '#1e88e5',
                    '#039be5',
                    '#00acc1',
                    '#00897b',
                    '#43a047',
                    '#c0ca33',
                    '#fdd835',
                    "#ffb300",
                    "#fb8c00",
                    "#f4511e"]

            }]
        },

        // Configuration options go here
        options: {
            aspectRatio: 1.2,
            "scales":{"xAxes":[{"ticks":{"beginAtZero":true}}]}
        }
    });
}

if (typeof canvas_members_books !== 'undefined') {
    var ctx = document.getElementById('members_pages').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'horizontalBar',
        order: 1,
        // The data for our dataset
        data: {
            labels: canvas_members_pages.labels,
            datasets: [{
                label: canvas_members_pages.datalabel,
                data: canvas_members_pages.data,
                backgroundColor: ['#e53935',
                    '#d81b60',
                    '#8e24aa',
                    '#5e35b1',
                    '#3949ab',
                    '#1e88e5',
                    '#039be5',
                    '#00acc1',
                    '#00897b',
                    '#43a047',
                    '#c0ca33',
                    '#fdd835',
                    "#ffb300",
                    "#fb8c00",
                    "#f4511e"]
            
            }]
        },

        // Configuration options go here
        options: {
            tooltips: {
                callbacks: {
                  label: function(tooltipItem, data) {
                    var label = data.datasets[tooltipItem.datasetIndex].label || '';
              
                    if (label) {
                      label += ': ';
                    }
                    label += tooltipItem.xLabel * -1;
                    return label;
                  }
                }
            },
            aspectRatio: 1.2,
            "scales":{
                "xAxes":[{
                    "ticks":{
                        "beginAtZero":true,
                        callback: function(value, index, values) {
                            return value * -1;
                        }

                    }}],
                "yAxes":[{position:'right'}]
            }
        }
    });
}