<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div id="map" style="height:400px"></div>
<div id="bar" style="height:400px"></div>
<!--map-->
<script src="http://echarts.baidu.com/build/dist/echarts.js"></script>
<script type="text/javascript">
    require.config({
        paths: {
            echarts: 'http://echarts.baidu.com/build/dist'
        }
    });
    // 使用
    require
    (
            [
                'echarts',
                'echarts/chart/map',
                'echarts/chart/bar'
            ],
            function (ec)
            {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('map'));
                var  option = {
                            tooltip : {
                                trigger: 'item',
                                formatter: '{b}'
                            },
                            series : [
                                {
                                    name: '中国',
                                    type: 'map',
                                    mapType: 'china',
                                    selectedMode : 'multiple',
                                    itemStyle:{
                                        normal:{label:{show:true}},
                                        emphasis:{label:{show:true}}
                                    },
                                    data:[
                                        {name:'广东',selected:true}
                                    ]
                                }
                            ]
                        };
                var ecConfig = require('echarts/config');
                myChart.on(ecConfig.EVENT.MAP_SELECTED, function (param){
                    var selected = param.selected;
                    var str = '当前选择： ';
                    for (var p in selected) {
                        if (selected[p]) {
                            str += p + ' ';
                        }
                    }
                    document.getElementById('wrong-message').innerHTML = str;
                })
                myChart.setOption(option);

                <!--bar-->
                var myChartBar = ec.init(document.getElementById('bar'));
                var optionBar = {
                    title : {
                        text: '某地区蒸发量和降水量',
                        subtext: '纯属虚构'
                    },
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['蒸发量','降水量']
                    },
                    toolbox: {
                        show : true,
                        feature : {
                            mark : {show: true},
                            dataView : {show: true, readOnly: false},
                            magicType : {show: true, type: ['line', 'bar']},
                            restore : {show: true},
                            saveAsImage : {show: true}
                        }
                    },
                    calculable : true,
                    xAxis : [
                        {
                            type : 'category',
                            data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            name:'蒸发量',
                            type:'bar',
                            data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3],
                            markPoint : {
                                data : [
                                    {type : 'max', name: '最大值'},
                                    {type : 'min', name: '最小值'}
                                ]
                            },
                            markLine : {
                                data : [
                                    {type : 'average', name: '平均值'}
                                ]
                            }
                        },
                        {
                            name:'降水量',
                            type:'bar',
                            data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3],
                            markPoint : {
                                data : [
                                    {name : '年最高', value : 182.2, xAxis: 7, yAxis: 183, symbolSize:18},
                                    {name : '年最低', value : 2.3, xAxis: 11, yAxis: 3}
                                ]
                            },
                            markLine : {
                                data : [
                                    {type : 'average', name : '平均值'}
                                ]
                            }
                        }
                    ]
                };
                myChartBar.setOption(optionBar);
            }
    );
</script>

<!--map-->

</body>
</html>