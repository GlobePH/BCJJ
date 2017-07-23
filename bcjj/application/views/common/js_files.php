<script src="<?php echo base_url();?>public/js/jquery-3.1.0.min.js"></script>
<script src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/js/sweetalert/sweetalert.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCB_tCLqHRYOW15a7Y0FMJtRe1sJpAioD8&libraries=places&callback=initMap" async defer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>

<script>

    $(document).ready(function(){

        $('#timepicker1_set').timepicker();
        $('#timepicker1_update').timepicker();

        var CheckEmailAddress = function(inputfield) {
            return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(inputfield);
        }

        var IsEmpty = function(value) {
            return (value == null || value.length === 0);
        }

        var CheckName = function(inputfield) {
            return /^[a-zA-Z- ]*$/.test(inputfield);
        }

        var InputError = function(element) {
            $(element).addClass('has-error');
        }

        var InputSuccess = function(element) {
            $(element).removeClass('has-error');
        }

        var CheckContactNo = function(inputfield) {
            return /^(0|\[0-9]{1,5})?([7-9][0-9]{9})$/.test(inputfield);
        }

        $(document).on('click', '#btn-submit-update', function(){
            let txt_contact_update         =   $('#txt_contact_update').val();
            let timepicker1_update         =   $('#timepicker1_update').val();
            let txt_to_address_update      =   $('#txt_to_address_update').val();
            let txt_from_address_update    =   $('#txt_from_address_update').val();
            let flag_error                  =   0;

            if ( IsEmpty(txt_contact_update) ) {
                InputError('#txt_contact_update');
                flag_error = 1;
            } else {
                if ( !CheckContactNo(txt_contact_update) ) {
                    InputError('#txt_contact_update');
                    flag_error = 1;
                } else {
                    InputSuccess('#txt_contact_update');
                }
            }

            if ( IsEmpty(txt_to_address_update) ) {
                InputError('#txt_to_address_update');
                flag_error = 1;
            } else {
                InputSuccess('#txt_to_address_update');
            }

            if ( IsEmpty(txt_from_address_update) ) {
                InputError('#txt_from_address_update');
                flag_error = 1;
            } else {
                InputSuccess('#txt_from_address_update');
            }

            if ( flag_error == 0 ) {
                $.ajax({
                    url: '<?php echo base_url(); ?>home/update',
                    method: "POST",
                    data: {
                        txt_contact_set         :   txt_contact_update,
                        timepicker1_set         :   timepicker1_update,
                        txt_to_address_set      :   txt_to_address_update,
                        txt_from_address_set    :   txt_from_address_update
                    },success:function(data){ 
                        $('#EditSetupContact').modal('hide');
                        swal({
                            title: "SMS Notification setup",
                            text: 'To receive an SMS Notification please text INFO to "21589227" for Globe Subscribers or text INFO to "29290589227" for non-Globe Subscribers. Reply YES to confirm the enrollment to SMS Notifications.',
                            type: 'success',
                            showCloseButton: true,
                            confirmButtonColor:   "#4695f0",
                            confirmButtonText :   "Ok",
                        }, function(){
                            location.href  =    "<?php echo base_url(); ?>";
                        });
                    },error:function(){
                    }
                });
            }
        });

        $(document).on('click', '#btn-submit-set', function(){
            let txt_contact_set         =   $('#txt_contact_set').val();
            let timepicker1_set         =   $('#timepicker1_set').val();
            let txt_to_address_set      =   $('#txt_to_address_set').val();
            let txt_from_address_set    =   $('#txt_from_address_set').val();
            let flag_error              =   0;

            if ( IsEmpty(txt_contact_set) ) {
                InputError('#txt_contact_set');
                flag_error = 1;
            } else {
                if ( !CheckContactNo(txt_contact_set) ) {
                    InputError('#txt_contact_set');
                    flag_error = 1;
                } else {
                    InputSuccess('#txt_contact_set');
                }
            }

            if ( IsEmpty(txt_to_address_set) ) {
                InputError('#txt_to_address_set');
                flag_error = 1;
            } else {
                InputSuccess('#txt_to_address_set');
            }

            if ( IsEmpty(txt_from_address_set) ) {
                InputError('#txt_from_address_set');
                flag_error = 1;
            } else {
                InputSuccess('#txt_from_address_set');
            }

            if ( flag_error == 0 ) {
                $.ajax({
                    url: '<?php echo base_url(); ?>home/update',
                    method: "POST",
                    data: {
                        txt_contact_set         :   txt_contact_set,
                        timepicker1_set         :   timepicker1_set,
                        txt_to_address_set      :   txt_to_address_set,
                        txt_from_address_set    :   txt_from_address_set
                    },success:function(data){ 
                        $('#NewSetupContact').modal('hide');
                        swal({
                            title: "SMS Notification setup",
                            text: 'To receive an SMS Notification please text INFO to "21589227" for Globe Subscribers or text INFO to "29290589227" for non-Globe Subscribers. Reply YES to confirm the enrollment to SMS Notifications.',
                            type: 'success',
                            showCloseButton: true,
                            confirmButtonColor:   "#4695f0",
                            confirmButtonText :   "Ok",
                        }, function(){
                            location.href  =    "<?php echo base_url(); ?>";
                        });
                    },error:function(){
                    }
                });
            }
        });

        $(document).on('click', '#btn-submit', function(){
            let txt_to_address      =   $('#txt_to_address').val();
            let txt_from_address    =   $('#txt_from_address').val();

            viewTrafficPosition(txt_to_address, txt_from_address);
        });

        $(document).on('click', '#btn-login', function(){
            let txt_email       =   $('#txt_email').val();
            let txt_pword       =   $('#txt_pword').val();
            let flag_error      =   0;

            if ( IsEmpty(txt_email) ) {
                InputError('#txt_email');
                flag_error = 1;
            } else {
                if ( !CheckEmailAddress(txt_email) ) {
                    InputError('#txt_email');
                    flag_error = 1;
                } else {
                    InputSuccess('#txt_email');
                }
            }

            if ( IsEmpty(txt_pword) ) {
                InputError('#txt_pword');
                flag_error = 1;
            }

            if ( flag_error == 0 ) {
                $.ajax({
                    url: '<?php echo base_url(); ?>home/login',
                    method: "POST",
                    data: {
                        txt_email       :   txt_email,
                        txt_pword       :   txt_pword,
                    },success:function(data){ 
                        if ( data == 0 ) {
                            InputSuccess('#txt_email');
                            InputSuccess('#txt_pword');
                            // $('#LoginModal').modal('hide');
                            // $('#loginFormDiv').load(location.href+" #loginFormDiv>*","");
                            location.href = "<?php echo base_url(); ?>";
                        } else {
                            InputError('#txt_email');
                            InputError('#txt_pword');
                        }
                    },error:function(){
                    }
                });
            }
        });

        $(document).on('click', '#btn-signup', function(){
            let txt_name_su     =   $('#txt_name_su').val();
            let txt_email_su    =   $('#txt_email_su').val();
            let txt_pword_su    =   $('#txt_pword_su').val();
            let flag_error      =   0;

            if ( IsEmpty(txt_name_su) ) {
                InputError('#txt_name_su');
                flag_error = 1;
            } else {
                if ( !CheckName(txt_name_su) ) {
                    InputError('#txt_name_su');
                    flag_error = 1;
                } else {
                    InputSuccess('#txt_name_su');
                }
            }

            if ( txt_pword_su.length <= 5 ) {
                InputError('#txt_pword_su');
                flag_error = 1;
            } else {
                InputSuccess('#txt_pword_su');
            }

            if ( IsEmpty(txt_email_su) ) {
                InputError('#txt_email_su');
                flag_error = 1;
            } else {
                if ( !CheckEmailAddress(txt_email_su) ) {
                    InputError('#txt_email_su');
                    flag_error = 1;
                } else {
                    InputSuccess('#txt_email_su');
                }
            }

            if ( flag_error == 0 ) {
                $.ajax({
                    url: '<?php echo base_url(); ?>home/insert',
                    method: "POST",
                    data: {
                        txt_name_su     :   txt_name_su,
                        txt_email_su    :   txt_email_su,
                        txt_pword_su    :   txt_pword_su,
                        platform        :   'Local'
                    },success:function(data){ 
                        if ( data == 0 ) {
                            $('#txt_name_su').val('');
                            $('#txt_email_su').val('');
                            $('#txt_pword_su').val('');
                        } else {
                            InputError('#txt_email_su');
                        }
                    },error:function(){
                    }
                });
            }

        });
        $(document).on('click', '#btn-signup-facebook', function(){
            let fb_email = "";
            FB.login(function(response) {
                if (response.authResponse) {
                    FB.api('/me?fields=id,email,name,first_name,last_name, picture, verified', function(response) {
                        if ( response.email != "" ) { fb_email = response.email; }
                        $.ajax ({
                            url: '<?php echo base_url(); ?>home/using_facebook',
                            method: "POST",
                            data: {
                                fb_email        : fb_email,
                                fb_id           : response.id,
                                fb_fname        : response.first_name,
                                fb_lname        : response.last_name,
                                fb_name         : response.name
                            },success:function(data){
                                if ( data == 0 ) {
                                    alert('Account registered.');
                                } else if ( data == 1 ) {
                                    alert('This account is already registed.');
                                }
                            },error:function(){
                                console.log('Error');
                            }
                        });
                    });
                } else {
                    console.log('User cancelled login or did not fully authorize.');
                }
            },{
                scope: 'email,public_profile',
                return_scopes: true
            });
            return false;
        });


        $(document).on('click', '#btn-login-facebook', function(){
            let fb_email = "";
            FB.login(function(response) {
                if (response.authResponse) {
                    FB.api('/me?fields=id,email', function(response) {
                        if ( response.email != undefined ) { fb_email = response.email; }
                        $.ajax({
                            url: '<?php echo base_url(); ?>home/login_facebook',
                            method: "POST",
                            data: {
                                fb_email        :   fb_email,
                                fb_id           :   response.id,
                            },success:function(data){ 
                                if ( data == 0 ) {
                                    location.href = "<?php echo base_url(); ?>";
                                } else {
                                    alert('Your account is not register');
                                }
                                // console.log(data);
                            },error:function(){
                                console.log('Error');
                            }
                        });
                    });
                } else {
                    console.log('User cancelled login or did not fully authorize.');
                }
            },{
                scope: 'email',
                return_scopes: true
            });
            return false;
        });

        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1378095148951705',
                xfbml      : true,
                cookie      : true,
                version: 'v2.9'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    });


    function initMap() {
        var mapOptions = {
            center: new google.maps.LatLng(14.5674522, 121.0319788),
            zoom: 13,
            mapTypeId: 'terrain'
        }

        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);
        var options = {
            componentRestrictions: {country: 'PH'}
        };
        var txt_to_address = document.getElementById('txt_to_address');
        var searchBox = new google.maps.places.Autocomplete(txt_to_address, options);

        var txt_from_address = document.getElementById('txt_from_address');
        var searchBox = new google.maps.places.Autocomplete(txt_from_address, options);

        <?php if ( !empty($information) ) { ?>
            var txt_to_address_set = document.getElementById('txt_to_address_set');
            var searchBox = new google.maps.places.Autocomplete(txt_to_address_set, options);
    
            var txt_from_address_set = document.getElementById('txt_from_address_set');
            var searchBox = new google.maps.places.Autocomplete(txt_from_address_set, options);
    
    
            var txt_to_address_update = document.getElementById('txt_to_address_update');
            var searchBox = new google.maps.places.Autocomplete(txt_to_address_update, options);
    
            var txt_from_address_update = document.getElementById('txt_from_address_update');
            var searchBox = new google.maps.places.Autocomplete(txt_from_address_update, options);
        <?php } ?>

        <?php
            if ( !empty($get_all) ) {
                foreach ( $get_all as $ga ) :
                    $date = date("g:i A", strtotime("-10 minutes", strtotime($ga->TIME)));
                    if ($this->time == $date) {
                        if ( $this->date == $ga->DATE ) {
                            $date = DateTime::createFromFormat('F d, Y', $ga->DATE);
                            $date->modify('+1 day');
        ?>
                            let get_id  = '<?php echo $ga->NO; ?>';
                            let date    = '<?php echo $date->format('F d, Y'); ?>';
                            let loc_to  = '<?php echo $ga->TO_LOCATION; ?>';
                            let from_to = '<?php echo $ga->FROM_LOCATION; ?>';
                            viewTrafficPosition1(loc_to, from_to);
                            $.ajax({
                                   url: '<?php echo base_url(); ?>home/notify_message',
                                   method: "POST",
                                   data: {
                                       get_id           :   get_id,
                                       date             :   date
                                   },success:function(data){ 
                                       console.log('SEND');
                                   },error:function(){
                                       console.log('Error');
                                   }
                            });

        <?php
                        } else {
                            echo 'console.log("NOT SEND")';
                        }
                    } else {
                        echo 'console.log("NOT SEND")';
                    }
                endforeach;
            }
        ?>
    }

    function viewTrafficPosition1(placeTo, placeFrom) {
        directionsDisplay = new google.maps.DirectionsRenderer({
            // polylineOptions:{
            //     strokeOpacity:0.50,
            //     strokeWeight:6,
            // //     strokeColor: 'green'
            // },
            draggable: true
        });

        directionsService = new google.maps.DirectionsService;
        

        directionsDisplay.addListener('directions_changed', function() {
          DistanceOut1(directionsDisplay.getDirections());
        });

        // polyline = new google.maps.Polyline({
        //   map:map
        // });

        
        calculateAndDisplayRoute1(directionsService, directionsDisplay, placeTo, placeFrom);     
    }

    function DistanceOut1(response) 
    {
        // console.log(response);
        let dist =  response.routes[0].legs[0].distance.text;
        let dura =  response.routes[0].legs[0].duration.text;
        let traf =  response.routes[0].legs[0].duration_in_traffic.text;

        let dura_val =  Math.trunc(response.routes[0].legs[0].duration.value / 60);
        let traf_val =  Math.trunc(response.routes[0].legs[0].duration_in_traffic.value / 60);

        let traffic_light   = dura_val * 1.25;
        let traffic_medium  = dura_val * 1.5;
        let traffic_heavy   = dura_val * 2;
        let statusTraffic = "";

        if (  dura_val <= 0 || traf_val < traffic_light ) {
            statusTraffic = 'light';
            $('.status').css({'background':'#64ea94'});
        } else if ( traf_val >= traffic_medium || traf_val < traffic_heavy ) {
            statusTraffic = 'medium';
            $('.status').css({'background':'#63ec8d'});
        } else if ( traf_val >= traffic_heavy ) {
            statusTraffic = 'heavy';
            $('.status').css({'background':'#ff6262'});
        }

        $.ajax({
            url: '<?php echo base_url(); ?>home/sendmessage',
            method: "POST",
            data: {
                statusTraffic   :   statusTraffic,
                dist            :   dist,
                dura            :   dura
            },success:function(data){ 
                console.log(data);
            },error:function(){
                console.log('Error');
            }
     });
    }

    function calculateAndDisplayRoute1(directionsService, directionsDisplay, toPlace, fromPlace) {
        directionsService.route({
        origin: toPlace,
        destination: fromPlace,

        travelMode: 'DRIVING',
        provideRouteAlternatives: true,
        drivingOptions: {
            departureTime: new Date(Date.now()),
            trafficModel: 'bestguess',
        },
        unitSystem: google.maps.UnitSystem.METRIC

        }, function(response, status) { 
            if (status == 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

    function calculateAndDisplayRoute1(directionsService, directionsDisplay, toPlace, fromPlace) {
        directionsService.route({
            origin: toPlace,
            destination: fromPlace,

            travelMode: 'DRIVING',
            provideRouteAlternatives: true,
            drivingOptions: {
                departureTime: new Date(Date.now()),
                trafficModel: 'bestguess',
            },
            unitSystem: google.maps.UnitSystem.METRIC

            }, function(response, status) { console.log(response);
            if (status == 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

    function viewTrafficPosition(placeTo, placeFrom) {
        directionsDisplay = new google.maps.DirectionsRenderer({
            polylineOptions:{
                strokeOpacity:0.50,
                strokeWeight:6,
            //     strokeColor: 'green'
            },
            draggable: true
        });

        directionsService = new google.maps.DirectionsService;
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12.83,
            center: {lat: 14.5473501, lng: 120.9829548}
        });
        
        var trafficLayer = new google.maps.TrafficLayer();
            trafficLayer.setMap(map);

        directionsDisplay.setMap(map);

        directionsDisplay.addListener('directions_changed', function() {
          DistanceOut(directionsDisplay.getDirections());
        });

        polyline = new google.maps.Polyline({
          map:map
        });

        calculateAndDisplayRoute(directionsService, directionsDisplay, placeTo, placeFrom);     
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay, toPlace, fromPlace) {
        directionsService.route({
            origin: toPlace,
            destination: fromPlace,

            travelMode: 'DRIVING',
            provideRouteAlternatives: true,
            drivingOptions: {
                departureTime: new Date(Date.now()),
                trafficModel: 'bestguess',
            },
            unitSystem: google.maps.UnitSystem.METRIC

            }, function(response, status) { console.log(response);
            if (status == 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

    function DistanceOut(response){
        let dist =  response.routes[0].legs[0].distance.text;
        let dura =  response.routes[0].legs[0].duration.text;
        let traf =  response.routes[0].legs[0].duration_in_traffic.text;

        let dura_val =  Math.trunc(response.routes[0].legs[0].duration.value / 60);
        let traf_val =  Math.trunc(response.routes[0].legs[0].duration_in_traffic.value / 60);

        let traffic_light   = dura_val * 1.25;
        let traffic_medium  = dura_val * 1.5;
        let traffic_heavy   = dura_val * 2;
        let statusTraffic = "";

        if (  dura_val <= 0 || traf_val < traffic_light ) {
            statusTraffic = 'light';
            $('.status').css({'background':'#64ea94'});
        } else if ( traf_val >= traffic_medium || traf_val < traffic_heavy ) {
            statusTraffic = 'medium';
            $('.status').css({'background':'#63ec8d'});
        } else if ( traf_val >= traffic_heavy ) {
            statusTraffic = 'heavy';
            $('.status').css({'background':'#ff6262'});
        }

        $('#get_status').html(statusTraffic);
        $('#get_distance').html(dist);
        $('#get_duration').html(dura);
    }

    

</script>