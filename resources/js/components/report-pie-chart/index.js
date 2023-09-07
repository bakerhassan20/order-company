(function () {
    "use strict";

    // Chart
    if ($("#report-pie-chart").length) {
        let ctx = $("#report-pie-chart")[0].getContext("2d");
        let myPieChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: [
                    "31 - 50 Years old",
                    ">= 50 Years old",
                    "17 - 30 Years old",
                ],
                datasets: [
                    {
                        data: [15, 10, 65],
                        backgroundColor: [
                            getColor("pending", 0.9),
                            getColor("warning", 0.9),
                            getColor("primary", 0.9),
                        ],
                        hoverBackgroundColor: [
                            getColor("pending", 0.9),
                            getColor("warning", 0.9),
                            getColor("primary", 0.9),
                        ],
                        borderWidth: 5,
                        borderColor: $("html").hasClass("dark")
                            ? getColor("darkmode.700")
                            : getColor("white"),
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });
    }
})();
