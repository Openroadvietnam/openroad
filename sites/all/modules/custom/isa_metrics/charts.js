
  // Load the Visualization API and the piechart package.
  google.load('visualization', '1.0', {'packages':['corechart']});
  google.load('visualization', '1',   {'packages':['geochart']});
  google.load('visualization', '1.0', {'packages':['controls']});


  // Set a callback to run when the Google Visualization API is loaded.
  google.setOnLoadCallback(drawCharts);

  // Globals variables for the dynamics changes
  var chart;
  var data;
  var geo_chart;
  var geo_data;
  var geo_colors;
  var current_line = 0;
  var line_options;
  var line_chart;
  var line_data;
  var line_colors;
  var current_pie = 0;
  var pie_options;
  var pie_chart;
  var pie_data;
  var pie_colors;
  var current_column = 0;
  var column_options;
  var column_chart;
  var column_data;

  // Callback that creates and populates all graphs
  function drawCharts() {
    var graphs = Drupal.settings.graphs;
    for (j=0; j<graphs.length; j++) {
      drawChart(graphs[j]);
    }
  }


  // instantiates the chart (pie, column,...), passes in the data and draws it.
  function drawChart(graph) {
  var datas = graph['data'];
  // Set chart options
  options = graph['options'];
  // Draw a geo chart
  if (options['type'] == 'GeoMap') {
    geo_colors = options.colors;
    geo_data = createDataTable(graph['columns']);
    geo_data.addRows(datas);

    geo_chart = new google.visualization.ChartWrapper({
          'chartType': 'GeoChart',
          'dataTable': geo_data,
          'options' : options.config,
          'view': {"columns": [0, 1]},
          'containerId': options['div']});

    geo_chart.setOption('colorAxis', {minValue: 0,  colors: ['#FFFFFF', geo_colors[0]]} );
    geo_chart.draw();
  }
  // Draw a line chart
  else if (options['type'] == 'LineChart') {
    line_data = [];
    for (l=0; l<datas.length; l++) {
      data_table = createDataTable(graph['columns'][l]);
      for (m=0; m<datas[l].length; m++) {
        var date = new Date();
        date.setTime(parseInt(datas[l][m][0] * 1000));
        datas[l][m][0] = date;
        data_table.addRow(datas[l][m]);
      }
      line_data[l] = data_table;
    }
    line_options = options.config;
    line_colors = options.colors;
    line_chart = new google.visualization.LineChart(document.getElementById(options['div']));
    line_chart.draw(line_data[current_line], line_options);
  }
  // Draw a combo chart
  else if (options['type'] == 'ComboChart') {
    if (datas[0] != null) {
      data = createDataTable(graph['columns']);
      data.addRows(datas);
      chart = new google.visualization.ComboChart(document.getElementById(options['div']));
      chart.draw(data, options.config);
    }
  }
  // Draw a column chart
  else if (options['type'] == 'ColumnChart') {
    column_data = [];
    for (var l=0; l<datas.length; l++) {
      data_table = createDataTable(graph['columns'][l]);
      data_table.addRows(datas[l]);
      column_data[l] = data_table;
    }
    column_options = options.config;
    column_chart = new google.visualization.ColumnChart(document.getElementById(options['div']));
    column_chart.draw(column_data[current_column], options.config);
  }
  // Draw a pie chart
  else if (options['type'] == 'PieChart') {
    pie_data = [];
    for (var l=0; l<datas.length; l++) {
      data_table = createDataTable(graph['columns']);
      data_table.addRows(datas[l]);
      pie_data[l] = data_table;
    }
    pie_options = options.config;
    pie_colors = options.colors;
    pie_chart = new google.visualization.PieChart(document.getElementById(options['div']));
    pie_chart.draw(pie_data[current_pie], pie_options);
  }
}

//Return a DataTable object
function createDataTable(columns_creation) {
  var data_table = new google.visualization.DataTable();

  for (i=0; i<columns_creation.length; i++) {
   data_table.addColumn(columns_creation[i][0], columns_creation[i][1]);
  }
  return data_table;
}

/*
 * Change the datas displayed by the geographical chart
 */
function geographicalChange(element) {
  geo_chart.setOption('colorAxis', {minValue: 0,  colors: ['#FFFFFF', geo_colors[element.selectedIndex]]} );
  geo_chart.setView({"columns": [0, element.selectedIndex + 1]});
  geo_chart.draw(geo_data);
}

/*
 * Change the datas displayed by the evolution chart
 */
function evolutionChange(element) {
  current_line = element.selectedIndex;
  line_options.colors = line_colors[current_line];
  line_chart.draw(line_data[current_line], line_options);
}

/*
 * Change the datas displayed by the repartition chart
 */
function repartitionChange(element) {
  current_pie = element.selectedIndex;
  pie_options.colors = pie_colors[current_pie];
  pie_chart.draw(pie_data[current_pie], pie_options);
}

/*
 * Change the datas displayed by the releases chart
 */
function releaseChange(element) {
  current_column = element.selectedIndex;
  column_chart.draw(column_data[current_column], column_options);
}