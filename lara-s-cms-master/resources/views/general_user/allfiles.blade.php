@php
    // USE LIBRARIES
    use App\Libraries\Helper;

    $link_get_data = route('general.files.get_data');
    $function_get_data = 'refresh_data();';

@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Allfiles</title>
    <meta name="description" content="Bootstrap.">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</head>

<body>

    <nav class="navbar navbar-dark " style=" background-color:  #500485;">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ URL::route('general.home') }}" class="u-image u-logo u-image-1" title="Home">
                    <img src="{{ asset('images/logowhite.png') }}" class="u-logo-image u-logo-image-1"  width="120"
                    height="75">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="">
                    <li class="u-nav-item">
                        <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-body-alt-color u-text-hover-palette-2-base"
                            href="{{ URL::route('general.home') }}"
                            style="padding: 27px ;font-weight: 1000">Home</a>
                    </li>
                    <li class="u-nav-item">
                        <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-body-alt-color u-text-hover-palette-2-base"
                            href="{{ URL::route('general.allbrance') }}"
                            style="padding: 27px ;font-weight: 1000">All Branches</a>
                    </li>
                    <li class="u-nav-item">
                        <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-body-alt-color u-text-hover-palette-2-base"
                            href="{{ URL::route('general.alldivision') }}"
                            style="padding: 27px ;font-weight: 1000">All Divisions</a>
                    </li>
                    <li class="u-nav-item">
                        <a
                            href="{{ URL::route('general.allemployees') }}" style="padding: 27px ;font-weight: 1000">All
                            Employees</a>
                    </li>
                    <li class="u-nav-item">
                        <a
                            href="{{ URL::route('general.allfiles') }}" style="padding: 27px ;font-weight: 1000">All
                            Files</a>
                    </li>
                    <li class="u-nav-item">
                        <a class="u-nav-item" href="{{ URL::route('general.alldivinfo')}}" style="padding: 27px ;font-weight: 1000">All info</a>
                    </li>
                    <li class="u-nav-item">
                        <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-body-alt-color u-text-hover-palette-2-base danger"
                            href="{{ URL::route('general.logout') }}"
                            style="padding: 27px ;font-weight: 1000">Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            {{-- filter by: division --}}
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="fa fa-bank"></i></span>
                            <select style="width: 200px" id="filetype" class="form-control select2">
                                @if (isset($filetypes))
                                <option value="all">- {{ ucwords(lang('choose all', $translation)) }} -</option>
                                    @foreach ($filetypes as $item)
                                        <option value="{{ $item->id }}">{{ $item->filetype }}</option>
                                    @endforeach

                                @else
                                    <option value="no_data" disabled>*NO DATA</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row header" style="text-align:center;color:rgb(71, 14, 54)">
                <h3></h3>
            </div>

            <table id="myTable" class="table table-striped table-bordered table-responsive table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center">File</th>
                        <th style="text-align: center">Branch</th>
                        <th style="text-align: center">Department</th>
                        <th style="text-align: center">Unit</th>
                        <th style="text-align: center">Download Link</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($files as $item)
                        <tr>
                            <td style="text-align: center">{{ $item->name?? '-' }}</td>
                            <td style="text-align: center">{{ $item->branch?? '-' }}</td>
                            <td style="text-align: center">{{ $item->department?? '-' }}</td>
                            <td style="text-align: center">{{ $item->unit?? '-' }}</td>
                            <td class="u-table-cell" style="text-align: center"><a href="{{ $item->filepath }}" target="_blank">Download</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
</body>

<script>
    $(document).ready(function() {
        $('#myTable').dataTable();
    });
</script>

<script>

    jQuery(document).ready(function() {
        jQuery('#filetype').change(function() {
            let filetype = jQuery(this).val();

            jQuery.ajax({
                url: '{{ $link_get_data }}',
                type: 'get',
                data: {
                    filetype: filetype,
                },

                success: function(response) {
                    if (typeof response.status != 'undefined') {
                        if (response.status == 'true') {
                            var html = '';
                            if (response.data == '') {
                                html +=
                                    '<tr><td colspan="6"><h2 class="text-center">{{ strtoupper(lang('no data available', $translation)) }}</h2></td></tr>';
                            } else {
                                $.each(response.data, function(index, value) {
                                    html += '<tr>';
                                    html += '<td style="text-align: center">' + value.name + '</td>';
                                    html += '<td style="text-align: center">' + value.branch + '</td>';
                                    html += '<td style="text-align: center">' + value.department + '</td>';
                                    html += '<td style="text-align: center">' + value.unit + '</td>';
                                    html += '<td style="text-align: center"><a href="' +  value.filepath  + '" target="_blank">Download</td>';
                                    html += '</tr>';
                                });
                            }
                            $('#tableBody').html(html);
                        } else {
                            alert(response.message);
                        }
                    } else {
                        alert('Server not respond, please refresh your page');
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(data);
                    console.log(textStatus);
                    console.log(errorThrown);
                }

            });
        });


    });
</script>

</html>
