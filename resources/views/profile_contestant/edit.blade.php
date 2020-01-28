@extends('layouts.app')

@section('content')
    <section class="w1100 white personal">
        <div class="">
            <ul class="personalTabs">
                <li class="profile active"><a href="{{ route('contestant') }}">профиль</a></li>
                <li class="notifications"><a href="{{ route('notification') }}">оповещения</a></li>
                <li class="myWork"><a href="{{ route('paper') }}">мои работы</a></li>
            </ul>

            <?php
                foreach($universities as $value) {
                    $universities_names[] = $value->university_name;
                }

                $universities_names = json_encode($universities_names, JSON_UNESCAPED_UNICODE);
            ?>

            <script>
                var countries = JSON.parse('<?php echo $universities_names; ?>');
            </script>

            <script>
                //var countries = ["Afghanistan","Albania"];



                // Данный код взят из этого примера:
                // https://www.w3schools.com/howto/howto_js_autocomplete.asp
                function autocomplete(inp, arr) {
                    /*the autocomplete function takes two arguments,
                    the text field element and an array of possible autocompleted values:*/
                    var currentFocus;
                    /*execute a function when someone writes in the text field:*/
                    inp.addEventListener("input", function(e) {
                        var a, b, i, val = this.value;
                        /*close any already open lists of autocompleted values*/
                        closeAllLists();
                        if (!val) { return false;}
                        currentFocus = -1;
                        /*create a DIV element that will contain the items (values):*/
                        a = document.createElement("DIV");
                        a.setAttribute("id", this.id + "autocomplete-list");
                        a.setAttribute("class", "autocomplete-items");
                        /*append the DIV element as a child of the autocomplete container:*/
                        this.parentNode.appendChild(a);
                        /*for each item in the array...*/
                        for (i = 0; i < arr.length; i++) {
                            /*check if the item starts with the same letters as the text field value:*/
                            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                                /*create a DIV element for each matching element:*/
                                b = document.createElement("DIV");
                                /*make the matching letters bold:*/
                                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                                b.innerHTML += arr[i].substr(val.length);
                                /*insert a input field that will hold the current array item's value:*/
                                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                                /*execute a function when someone clicks on the item value (DIV element):*/
                                  b.addEventListener("click", function(e) {
                                  /*insert the value for the autocomplete text field:*/
                                  inp.value = this.getElementsByTagName("input")[0].value;
                                  /*close the list of autocompleted values,
                                  (or any other open lists of autocompleted values:*/
                                  closeAllLists();
                                });
                                a.appendChild(b);
                            }
                        }
                    });
                    /*execute a function presses a key on the keyboard:*/
                    inp.addEventListener("keydown", function(e) {
                        var x = document.getElementById(this.id + "autocomplete-list");
                        if (x) x = x.getElementsByTagName("div");
                        if (e.keyCode == 40) {
                        /*If the arrow DOWN key is pressed,
                        increase the currentFocus variable:*/
                        currentFocus++;
                        /*and and make the current item more visible:*/
                        addActive(x);
                        } else if (e.keyCode == 38) { //up
                        /*If the arrow UP key is pressed,
                        decrease the currentFocus variable:*/
                        currentFocus--;
                        /*and and make the current item more visible:*/
                        addActive(x);
                        } else if (e.keyCode == 13) {
                        /*If the ENTER key is pressed, prevent the form from being submitted,*/
                        e.preventDefault();
                        if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                        }
                        }
                    });
                    function addActive(x) {
                        /*a function to classify an item as "active":*/
                        if (!x) return false;
                        /*start by removing the "active" class on all items:*/
                        removeActive(x);
                        if (currentFocus >= x.length) currentFocus = 0;
                        if (currentFocus < 0) currentFocus = (x.length - 1);
                        /*add class "autocomplete-active":*/
                        x[currentFocus].classList.add("autocomplete-active");
                    }
                    function removeActive(x) {
                        /*a function to remove the "active" class from all autocomplete items:*/
                        for (var i = 0; i < x.length; i++) {
                        x[i].classList.remove("autocomplete-active");
                        }
                    }
                    function closeAllLists(elmnt) {
                        /*close all autocomplete lists in the document,
                        except the one passed as an argument:*/
                        var x = document.getElementsByClassName("autocomplete-items");
                        for (var i = 0; i < x.length; i++) {
                            if (elmnt != x[i] && elmnt != inp) {
                                x[i].parentNode.removeChild(x[i]);
                            }
                        }
                    }
                    /*execute a function when someone clicks in the document:*/
                    document.addEventListener("click", function (e) {
                    closeAllLists(e.target);
                    });
                } 
            </script>

           <!--  <script>
                autocomplete(document.getElementById("myInput"), countries);
                autocomplete(document.getElementById("university_name"), countries);
            </script> -->

            <form autocomplete="off" class="ProfileBox" action="{{ route('contestant.update', $user->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="profileBoxInfo">
                    <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                    <label for="full_name" class="profileInfo fl">{{ __('ФИО:') }}</label>
                    <input type="text" name="full_name" value="{{ $user->full_name }}">
                    
                </div>
                @if($errors->has('full_name'))
                    <div style="color:red; padding-left: 230px">{{ $errors->first('full_name') }}</div>
                @endif

                <div class="autocomplete">
                    <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                    <label for="university_name" class="profileInfo fl">{{ __('ВУЗ:') }}</label>
                    <input style="width: 500px" type="text" name="university_name" id="university_name" value="{{ $university->university_name }}">
                    <!-- <div class="autocomplete">
                        <input type="text" name="university_name" id="university_name2">
                    </div> -->
                </div>
                @if($errors->has('university_name'))
                    <div style="color:red; padding-left: 230px">{{ $errors->first('university_name') }}</div>
                @endif

                <div class="profileBoxInfo">
                    <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                    <label for="faculty_name" class="profileInfo fl">{{ __('Факультет:') }}</label>
                    <div class="fl">
                        <input type="text" name="faculty_name" value="{{ $contestant->faculty_name }}">
                    </div>
                </div>
                @if($errors->has('faculty_name'))
                    <div style="color:red; padding-left: 230px">{{ $errors->first('faculty_name') }}</div>
                @endif

                <div class="profileBoxInfo">
                    <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                    <label for="specialty_name" class="profileInfo fl">{{ __('Специальность:') }}</label>
                    <div class="fl">
                        <input type="text" name="specialty_name" value="{{ $contestant->specialty_name }}">
                    </div>
                </div>
                @if($errors->has('specialty_name'))
                    <div style="color:red; padding-left: 230px">{{ $errors->first('specialty_name') }}</div>
                @endif

                <div class="profileBoxInfo">
                    <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                    <label for="year" class="profileInfo fl">{{ __('Курс:') }}</label>
                    <div class="fl">
                        <input type="text" name="year" value="{{ $contestant->year }}">
                    </div>
                </div>
                @if($errors->has('year'))
                    <div style="color:red; padding-left: 230px">{{ $errors->first('year') }}</div>
                @endif

                <div class="profileBoxInfo">
                    <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label> -->
                    <label for="name" class="profileInfo fl">{{ __('Публикаций:') }}</label>
                    <div class="fl">
                        {{ $papersCount }}
                    </div>
                </div>

              

                <div class="editProfile fl">
                    <input type="submit" value="Сохранить изменения">
                </div>
            </form>
            <div class="editProfile myButton2 fl">
                    <button onclick="location.href = '{{ route('contestant') }}';" id="myButton" class="float-left submit-button" >Отмена</button>
            </div>
        </div>

         <script>
            autocomplete(document.getElementById("university_name"), countries);
        </script>
    </section>
    <div class="whiteLine"></div>
@endsection

