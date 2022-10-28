<template>
    <div>
        <div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="dbox dbox--color-1">
				<div class="dbox__icon">
					<i class="fas fa-users"></i>
				</div>
				<div class="dbox__body">
					<span class="dbox__count" v-text="personEntry"></span>
					<span class="dbox__count" v-text="personEntryCount"></span>
					<span class="dbox__title fw-bolder">Most Person Entries</span>
				</div>


			</div>
		</div>
		<div class="col-md-4">
			<div class="dbox dbox--color-2">
				<div class="dbox__icon">
					<i class="fa-solid fa-flag"></i>
				</div>
				<div class="dbox__body">
					<span class="dbox__count" v-text="countryEntry"></span>
					<span class="dbox__count" v-text="countryEntryCount"></span>
					<span class="dbox__title fw-bolder">Most Country Entries</span>
				</div>


			</div>
		</div>
		<div class="col-md-4">
			<div class="dbox dbox--color-3">
				<div class="dbox__icon">
					<i class="fa-solid fa-briefcase"></i>
				</div>
				<div class="dbox__body">
                    <span class="dbox__count" v-text="careerEntry"></span>
                    <span class="dbox__count" v-text="careerEntryCount"></span>
					<span class="dbox__title fw-bolder">Most Career Entries</span>
				</div>

			</div>
		</div>
	</div>

    <div class="row">
        <div class="col-md-6">
            <div id="barchartContainer"></div>
        </div>
        <div class="col-md-6">
            <div id="piechartContainer"></div>
        </div>
    </div>
</div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                personEntry : '',
                personEntryCount : '',
                countryEntry : '',
                countryEntryCount : '',
                careerEntry : '',
                careerEntryCount : '',
            }
        },

        methods : {
            barChart(){
                axios.post('/dashboard/chart' , {'type' : 'bar'})
                .then((response) => {
                    console.log(response.data)
                    Highcharts.chart('barchartContainer', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Celebrities Rank of '+ response.data[1]
                },

                xAxis: {
                    categories: response.data[0],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 1,
                    title: {
                        text: 'Population (millions)',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' Rank'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 80,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Year '+response.data[1],
                    data: [10,9,8,7,6,5,4,3,2,1]
                },]
            });
                })

            },

            pieChart(){
                axios.post('/dashboard/chart' , {'type' : 'pie'})
                .then((response) => {
                    Highcharts.chart('piechartContainer', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Celebrities lists of '+ response.data[1]
                },
                tooltip: {

                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            // format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Rank',
                    colorByPoint: true,
                    data: response.data[0]
                }]
            });
                })

            }
        },

        mounted(){
            let point = this;
            axios.post('/dashboard/count')
            .then((response)=>{
                console.log(response.data)
                if(response.data[0].length > 0){
                    point.personEntry = response.data[0][0]['recipient']
                    point.personEntryCount = response.data[0][0]['person_count']
                }
                if(response.data[1].length > 0){
                    point.countryEntry = response.data[1][0]['country']
                    point.countryEntryCount = response.data[1][0]['country_count']
                }
                if(response.data[2].length > 0){
                    point.careerEntry = response.data[2][0]['career']
                    point.careerEntryCount = response.data[2][0]['career_count']
                }
                console.log(response.data[0])
            })

            this.barChart();
            this.pieChart();
        }
    }
</script>

<style lang="scss" scoped>

</style>
