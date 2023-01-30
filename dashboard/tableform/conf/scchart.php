<?php 
$dates = date('Y-m-d');
$yy=substr($dates,0,4);
 $sql_pie = "SELECT category_name , COUNT(repair.category_id) as cid  FROM repair,category WHERE repair_id and repair.category_id=category.category_id GROUP by repair.category_id";
 $res_c = $conn->query($sql_pie);
 
 $sql_bar = "SELECT category_name , COUNT(repair.category_id) as cid  FROM repair,category WHERE repair_id and repair.category_id=category.category_id GROUP by repair.category_id";
 $res_bar = $conn->query($sql_bar);

 if (!$res_bar) {
    die('<p><strong style="color:#FF0000">!! Invalid query:</strong> ' . $mysqli->error.'</p>');
 }

 $sql_bar2 = "SELECT DATE_FORMAT(repair_date, '%M'),COUNT(repair_id) FROM repair WHERE substr(repair_date,1,4)='$yy' GROUP BY DATE_FORMAT(repair_date, '%m%') ASC";
 $res_bar2 = $conn->query($sql_bar2);

 $sql_bar3 = "SELECT status_name, fullname , COUNT(technician_id)  FROM repair,repair_status,tblusers where repair.technician_id=tblusers.id and repair.status_id=repair_status.status_id and technician_id GROUP by repair.status_id";
 $res_bar3 = $conn->query($sql_bar3);

 

 if (!$res_bar2) {
    die('<p><strong style="color:#FF0000">!! Invalid query:</strong> ' . $mysqli->error.'</p>');
 }

?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    
 $(function () {
    $('#piechwart').highcharts({
        chart: {
            height: 250,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            backgroundColor: 'transparent',
            type: 'spline'
        },
        title: {
            
            text: ' <span class="label2"></span>' //ใส่ชื่อกราฟ
            
        },
        colors: [ '#FFFCEF', '#FAF8E7','#F2F2D5'],
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:,.0f}  ({point.percentage:.1f}%)</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:,.0f} (<strong>{point.percentage:.1f} %</strong>)',
                    style: {
                        
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
                    }
                }
            }
        },
        xAxis: {
            
            labels: {
            style: {
                color: 'white'
            }
        },
            crosshair: true
            
        },
        yAxis: {
            labels: {
        style: {
            color: 'white'
               }
            },
            min: 0,
            title: {
                text: 'จำนวน',
                style: {
            color: 'white'
               }
            }
        },
  credits: {
   enabled: false
  },
        series: [{
            name: "",
            colorByPoint: true,
            data: [
   <?php
   $c_field = $res_c->field_count-1;
    $c_pie=0; while($row_pie = $res_c->fetch_array(MYSQLI_NUM)){ $c_pie++; ?>
   <?php if($c_pie>1){ ?>,<?php } ?>
    {
     name: "<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row_pie[0]))))); ?>",
     y: <?php echo $row_pie[$c_field]; ?>
    }
   <?php } ?>
   ]
        }]
    });
});
</script>
        
<script type="text/javascript">
$(function () {
    $('#barchart').highcharts({
        chart: {
            height: 250,
            backgroundColor: 'transparent',
            type: 'column'
        },
        colors: ['white'],
        title: {
            text: '<span class="label2"></span>' //ใส่ชื่อกราฟ
        },
/*        subtitle: {
            text: ''
        },*/
        xAxis: {
            
            categories: [
            <?php
                $c_field_bar = $res_bar->field_count-1;
                $c_bar=0; while($row_bar = $res_bar->fetch_array(MYSQLI_NUM)){ $c_bar++; ?>
            <?php if($c_bar>1){ ?>,<?php } 
                $data_bar[] = $row_bar[$c_field_bar]; 
            ?>
              '<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row_bar[0]))))); ?>'
              <?php } ?>
            ],
            labels: {
            style: {
                color: 'white'
            }
        },
            crosshair: true
            
        },
        yAxis: {
            labels: {
        style: {
            color: 'white'
               }
            },
            min: 0,
            title: {
                text: 'จำนวน',
                style: {
            color: 'white'
               }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat:  '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                          '<td style="padding:0"><b>{point.y:,.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
    dataLabels: {
     enabled: true,
     color: 'orange'
    }
   }
        },
  credits: {
   enabled: false
  },
        series: [{
            name: '',
            data: [<?php echo join(',',$data_bar); ?>]
 
        }]
    });
});
</script>

<script type="text/javascript">
$(function () {
    $('#bar3chart').highcharts({
        chart: {
            height: 250,
            backgroundColor: 'transparent',
            type: 'column'
        },
        colors: ['white'],
        title: {
            text: '<span class="label2"></span>' //ใส่ชื่อกราฟ
        },
/*        subtitle: {
            text: ''
        },*/
        xAxis: {
            
            categories: [
            <?php
                $c_field_bar2 = $res_bar2->field_count-1;
                $c_bar2=0; while($row_bar2 = $res_bar2->fetch_array(MYSQLI_NUM)){ $c_bar2++; ?>
            <?php if($c_bar2>1){ ?>,<?php } 
                $data_bar2[] = $row_bar2[$c_field_bar2]; 
            ?>
              '<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row_bar2[0]))))); ?>'
            <?php } ?>
            ],
            labels: {
            style: {
                color: 'white'
            }
        },
            crosshair: true
            
        },
        yAxis: {
            labels: {
        style: {
            color: 'white'
               }
            },
            min: 0,
            title: {
                text: 'จำนวน',
                style: {
            color: 'white'
               }
            }
        },
        
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
        dataLabels: {
        enabled: true,
        color: 'red'
        }
    }
            },
    credits: {
    enabled: false
    },
            series: [{
                name: '',
                data: [<?php echo join(',',$data_bar2); ?>]
    
            }]
        });
    });
    </script>

<script type="text/javascript">
$(function () {
    $('#bar4chart').highcharts({
        chart: {
            height: 250,
            backgroundColor: 'transparent',
            type: 'column'
        },
        colors: ['white'],
        title: {
            text: '<span class="label2"></span>' //ใส่ชื่อกราฟ
        },
/*        subtitle: {
            text: ''
        },*/
        xAxis: {
            
            categories: [
            <?php
                $c_field_bar3 = $res_bar3->field_count-1;
                $c_bar3=0; while($row_bar3 = $res_bar3->fetch_array(MYSQLI_NUM)){ $c_bar3++; ?>
            <?php if($c_bar3>1){ ?>,<?php } 
                $data_bar3[] = $row_bar3[$c_field_bar3]; 
            ?>
              '<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row_bar3[0]))))); ?>'
            <?php } ?>
            ],
            labels: {
            style: {
                color: 'white'
            }
        },
            crosshair: true
            
        },
        yAxis: {
            labels: {
        style: {
            color: 'white'
               }
            },
            min: 0,
            title: {
                text: 'จำนวน',
                style: {
            color: 'white'
               }
            }
        },
        
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
        dataLabels: {
        enabled: true,
        color: 'red'
        }
    }
            },
    credits: {
    enabled: false
    },
            series: [{
                name: '',
                data: [<?php echo join(',',$data_bar3); ?>]
    
            }]
        });
    });
    </script>