@extends('layout.sidebar')
@section('title', 'Create Contact')
@section('heading' , 'Create Contact')
@section('content')
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <form method="POST" enctype="multipart/form-data">
                <label class="formbold-form-label">Image</label>
                <input type="file" class="formbold-form-input" name="image" required>
                <div class="formbold-input-flex">
                    <div>
                        <label for="firstname" class="formbold-form-label">
                            First name
                        </label>
                        <input
                            type="text"
                            name="firstname"
                            id="firstname"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label for="lastname" class="formbold-form-label"> Last name </label>
                        <input
                            type="text"
                            name="lastname"
                            id="lastname"
                            class="formbold-form-input"
                        />
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="email" class="formbold-form-label"> Email </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label for="phone" class="formbold-form-label"> Phone number </label>
                        <input
                            type="text"
                            name="phone"
                            id="phone"
                            class="formbold-form-input"
                        />
                    </div>
                </div>

                <div class="formbold-mb-3">
                    <label for="address" class="formbold-form-label">
                        Address
                    </label>
                    <input
                        type="text"
                        name="address"
                        id="address"
                        class="formbold-form-input"
                    />
                </div>
{{--                --}}

                <div class="formbold-input-flex">
                    <div>
                        <label for="company" class="formbold-form-label"> Company </label>
                        <input
                            type="text"
                            name="company"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label class="formbold-form-label"> Job </label>
                        <input
                            type="text"
                            name="job"
                            class="formbold-form-input"
                        />
                    </div>
                </div>

                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate">
                </div>

{{--                --}}
                <div class="formbold-input-flex">
                    <div>
                        <label for="state" class="formbold-form-label"> State/Prvince </label>
                        <input
                            type="text"
                            name="state"
                            id="state"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label for="country" class="formbold-form-label"> Country </label>
                        <input
                            type="text"
                            name="country"
                            id="country"
                            class="formbold-form-input"
                        />
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="post" class="formbold-form-label"> Post/Zip code </label>
                        <input
                            type="text"
                            name="post"
                            id="post"
                            class="formbold-form-input"
                        />
                    </div>
                    <div>
                        <label for="area" class="formbold-form-label"> Area Code </label>
                        <input
                            type="text"
                            name="area"
                            id="area"
                            class="formbold-form-input"
                        />
                    </div>
                </div>

                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" id="note" name="note" placeholder="Enter note"></textarea>
                </div>

                <button class="formbold-btn">Register Now</button>
            </form>
        </div>
    </div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
        .formbold-mb-3 {
            margin-bottom: 15px;
        }
        .formbold-relative {
            position: relative;
        }
        .formbold-opacity-0 {
            opacity: 0;
        }
        .formbold-stroke-current {
            stroke: currentColor;
        }
        #supportCheckbox:checked ~ div span {
            opacity: 1;
        }

        .formbold-main-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
        }

        .formbold-form-wrapper {
            margin: 0 auto;
            max-width: 570px;
            width: 100%;
            background: white;
            padding: 40px;
        }

        .formbold-img {
            margin-bottom: 45px;
        }

        .formbold-form-title {
            margin-bottom: 30px;
        }
        .formbold-form-title h2 {
            font-weight: 600;
            font-size: 28px;
            line-height: 34px;
            color: #07074d;
        }
        .formbold-form-title p {
            font-size: 16px;
            line-height: 24px;
            color: #536387;
            margin-top: 12px;
        }

        .formbold-input-flex {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }
        .formbold-input-flex > div {
            width: 50%;
        }
        .formbold-form-input {
            text-align: center;
            width: 100%;
            padding: 13px 22px;
            border-radius: 5px;
            border: 1px solid #dde3ec;
            background: #ffffff;
            font-weight: 500;
            font-size: 16px;
            color: #536387;
            outline: none;
            resize: none;
        }
        .formbold-form-input:focus {
            border-color: #6a64f1;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }
        .formbold-form-label {
            color: #536387;
            font-size: 14px;
            line-height: 24px;
            display: block;
            margin-bottom: 10px;
        }

        .formbold-checkbox-label {
            display: flex;
            cursor: pointer;
            user-select: none;
            font-size: 16px;
            line-height: 24px;
            color: #536387;
        }
        .formbold-checkbox-label a {
            margin-left: 5px;
            color: #6a64f1;
        }
        .formbold-input-checkbox {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }
        .formbold-checkbox-inner {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            margin-right: 16px;
            margin-top: 2px;
            border: 0.7px solid #dde3ec;
            border-radius: 3px;
        }

        .formbold-btn {
            font-size: 16px;
            border-radius: 5px;
            padding: 14px 25px;
            border: none;
            font-weight: 500;
            background-color: #6a64f1;
            color: white;
            cursor: pointer;
            margin-top: 25px;
        }
        .formbold-btn:hover {
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/button.css')}}">
<script>
    $(document).ready(function() {
        $('#contact_form').bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                first_name: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: 'Please supply your first name'
                        }
                    }
                },
                last_name: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: 'Please supply your last name'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your email address'
                        },
                        emailAddress: {
                            message: 'Please supply a valid email address'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your phone number'
                        },
                        phone: {
                            country: 'US',
                            message: 'Please supply a vaild phone number with area code'
                        }
                    }
                },
                address: {
                    validators: {
                        stringLength: {
                            min: 8,
                        },
                        notEmpty: {
                            message: 'Please supply your street address'
                        }
                    }
                },
                city: {
                    validators: {
                        stringLength: {
                            min: 4,
                        },
                        notEmpty: {
                            message: 'Please supply your city'
                        }
                    }
                },
                state: {
                    validators: {
                        notEmpty: {
                            message: 'Please select your state'
                        }
                    }
                },
                zip: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your zip code'
                        },
                        zipCode: {
                            country: 'US',
                            message: 'Please supply a vaild zip code'
                        }
                    }
                },
                comment: {
                    validators: {
                        stringLength: {
                            min: 10,
                            max: 200,
                            message:'Please enter at least 10 characters and no more than 200'
                        },
                        notEmpty: {
                            message: 'Please supply a description of your project'
                        }
                    }
                }
            }
        })
            .on('success.form.bv', function(e) {
                $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function(result) {
                    console.log(result);
                }, 'json');
            });
    });


</script>
{{--    <div class="demo-page">--}}
{{--        <main class="demo-page-content" style="align-content: center">--}}
{{--            <section>--}}
{{--                <div class="href-target" id="input-types"></div>--}}
{{--                <h1>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">--}}
{{--                        <line x1="21" y1="10" x2="3" y2="10" />--}}
{{--                        <line x1="21" y1="6" x2="3" y2="6" />--}}
{{--                        <line x1="21" y1="14" x2="3" y2="14" />--}}
{{--                        <line x1="21" y1="18" x2="3" y2="18" />--}}
{{--                    </svg>--}}
{{--                    Input types--}}
{{--                </h1>--}}
{{--                <p>All available input types are included</p>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Text</label>--}}
{{--                    <input type="text" placeholder="Your name" value="" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Email</label>--}}
{{--                    <input type="email" placeholder="Your email" value="" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Phonenumber</label>--}}
{{--                    <input type="tel" placeholder="Your phonenumber" value="" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Url</label>--}}
{{--                    <input type="url" placeholder="www.google.com" value="" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Password</label>--}}
{{--                    <input type="password" placeholder="Your password" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Search</label>--}}
{{--                    <input type="search" placeholder="Search all the things" value="" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Disabled field</label>--}}
{{--                    <input type="text" disabled placeholder="Your name" value="" />--}}
{{--                </div>--}}
{{--                <details>--}}
{{--                    <summary>--}}
{{--                        <div class="toggle-code">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">--}}
{{--                                <polyline points="16 18 22 12 16 6" />--}}
{{--                                <polyline points="8 6 2 12 8 18" />--}}
{{--                            </svg>--}}
{{--                            Toggle code--}}
{{--                        </div>--}}
{{--                    </summary>--}}
{{--                    <script src="https://gist.github.com/nielsVoogt/e25c9c8f2b8456bbd1239b775d21333f.js"></script>--}}
{{--                </details>--}}
{{--            </section>--}}

{{--            <section>--}}
{{--                <div class="href-target" id="checkbox-and-radio"></div>--}}
{{--                <h1>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square">--}}
{{--                        <polyline points="9 11 12 14 22 4" />--}}
{{--                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />--}}
{{--                    </svg>--}}
{{--                    Checkbox and Radio--}}
{{--                </h1>--}}
{{--                <p>--}}
{{--                    These are your basic <code>input[type="radio"]</code> and--}}
{{--                    <code>input[type="checkbox"]</code> elements. They have a label and--}}
{{--                    can contain secondary information by adding a--}}
{{--                    <code>small</code> element inside the <code>label</code>.--}}
{{--                </p>--}}

{{--                <fieldset class="nice-form-group">--}}
{{--                    <div class="nice-form-group">--}}
{{--                        <input type="radio" name="radio" id="r-1" />--}}
{{--                        <label for="r-1">Radio button with label</label>--}}
{{--                    </div>--}}

{{--                    <div class="nice-form-group">--}}
{{--                        <input type="radio" name="radio" id="r-2" />--}}
{{--                        <label for="r-2">--}}
{{--                            Radio button with label--}}
{{--                            <small>Radio can have additional information</small>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </fieldset>--}}

{{--                <fieldset class="nice-form-group">--}}
{{--                    <div class="nice-form-group">--}}
{{--                        <input type="checkbox" id="check-1" />--}}
{{--                        <label for="check-1">Checkbox with label</label>--}}
{{--                    </div>--}}

{{--                    <div class="nice-form-group">--}}
{{--                        <input type="checkbox" id="check-2" />--}}
{{--                        <label for="check-2">--}}
{{--                            Checkbox with label--}}
{{--                            <small>I am additional information regarding this field</small>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </fieldset>--}}
{{--                <br />--}}
{{--                <p>--}}
{{--                    <strong style="display: block">Switch</strong>--}}
{{--                    If you want a checkbox to look like a switch, just add a--}}
{{--                    <code>.switch</code> class to the checkbox input element--}}
{{--                </p>--}}

{{--                <fieldset class="nice-form-group">--}}
{{--                    <div class="nice-form-group">--}}
{{--                        <input type="checkbox" id="check-3" class="switch" />--}}
{{--                        <label for="check-3">Switch with label</label>--}}
{{--                    </div>--}}

{{--                    <div class="nice-form-group">--}}
{{--                        <input type="checkbox" id="check-4" class="switch" />--}}
{{--                        <label for="check-4">--}}
{{--                            Switch with label--}}
{{--                            <small>I am additional information regarding this field</small>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </fieldset>--}}

{{--                <details>--}}
{{--                    <summary>--}}
{{--                        <div class="toggle-code">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">--}}
{{--                                <polyline points="16 18 22 12 16 6" />--}}
{{--                                <polyline points="8 6 2 12 8 18" />--}}
{{--                            </svg>--}}
{{--                            Toggle code--}}
{{--                        </div>--}}
{{--                    </summary>--}}
{{--                    <script src="https://gist.github.com/nielsVoogt/5c490e16bc1b63bba29d4ee76477f94d.js"></script>--}}
{{--                </details>--}}
{{--            </section>--}}

{{--            <section>--}}
{{--                <div class="href-target" id="fieldset"></div>--}}
{{--                <h1>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" style="transform: rotate(90deg)" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns">--}}
{{--                        <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18" />--}}
{{--                    </svg>--}}
{{--                    Fieldset--}}
{{--                </h1>--}}
{{--                <p>--}}
{{--                    The <code>fieldset</code> is used to group multiple related input--}}
{{--                    fields. All nested <code>.nice-form-group</code> elements within--}}
{{--                    will automaticly have a smaller margin.--}}
{{--                </p>--}}

{{--                <fieldset class="nice-form-group">--}}
{{--                    <legend>Select your favorite framework</legend>--}}
{{--                    <div class="nice-form-group">--}}
{{--                        <input type="radio" name="radio" id="react" />--}}
{{--                        <label for="react">React</label>--}}
{{--                    </div>--}}

{{--                    <div class="nice-form-group">--}}
{{--                        <input type="radio" name="radio" id="vue" />--}}
{{--                        <label for="vue">Vue</label>--}}
{{--                    </div>--}}

{{--                    <div class="nice-form-group">--}}
{{--                        <input type="radio" name="radio" id="angular" />--}}
{{--                        <label for="angular">Angular</label>--}}
{{--                    </div>--}}
{{--                </fieldset>--}}

{{--                <fieldset class="nice-form-group">--}}
{{--                    <legend>Select your favorite languages</legend>--}}
{{--                    <div class="nice-form-group">--}}
{{--                        <input type="checkbox" id="css" />--}}
{{--                        <label for="css">CSS</label>--}}
{{--                    </div>--}}

{{--                    <div class="nice-form-group">--}}
{{--                        <input type="checkbox" id="html" />--}}
{{--                        <label for="html">HTML</label>--}}
{{--                    </div>--}}

{{--                    <div class="nice-form-group">--}}
{{--                        <input type="checkbox" id="js" />--}}
{{--                        <label for="js">Javascript</label>--}}
{{--                    </div>--}}
{{--                </fieldset>--}}
{{--                <details>--}}
{{--                    <summary>--}}
{{--                        <div class="toggle-code">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">--}}
{{--                                <polyline points="16 18 22 12 16 6" />--}}
{{--                                <polyline points="8 6 2 12 8 18" />--}}
{{--                            </svg>--}}
{{--                            Toggle code--}}
{{--                        </div>--}}
{{--                    </summary>--}}
{{--                    <script src="https://gist.github.com/nielsVoogt/e513d0df728dfc3fb1f5f9ecae042bf8.js"></script>--}}
{{--                </details>--}}
{{--            </section>--}}

{{--            <section>--}}
{{--                <div class="href-target" id="icons"></div>--}}
{{--                <h1>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-feather">--}}
{{--                        <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z" />--}}
{{--                        <line x1="16" y1="8" x2="2" y2="22" />--}}
{{--                        <line x1="17.5" y1="15" x2="9" y2="15" />--}}
{{--                    </svg>--}}
{{--                    Icons--}}
{{--                </h1>--}}
{{--                <p>--}}
{{--                    For some input types it could make sense to show a icon. These icons--}}
{{--                    are hidden by default but can be added by adding either--}}
{{--                    <code>.icon-left</code> or <code>.icon-right</code> to the input--}}
{{--                    element. The icons used are from--}}
{{--                    <a href="https://feathericons.com/" target="_blank">feathericons</a>.--}}
{{--                </p>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Phonenumber</label>--}}
{{--                    <input type="tel" placeholder="Your phonenumber" value="" class="icon-left" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Url</label>--}}
{{--                    <input type="url" placeholder="www.google.com" value="" class="icon-left" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Email</label>--}}
{{--                    <input type="email" placeholder="Your email" value="" class="icon-left" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Password</label>--}}
{{--                    <input type="password" placeholder="Your password" class="icon-left" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Phonenumber</label>--}}
{{--                    <input type="tel" placeholder="Your phonenumber" value="" class="icon-right" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Url</label>--}}
{{--                    <input type="url" placeholder="www.google.com" value="" class="icon-right" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Email</label>--}}
{{--                    <input type="email" placeholder="Your email" value="" class="icon-right" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Password</label>--}}
{{--                    <input type="password" placeholder="Your password" class="icon-right" />--}}
{{--                </div>--}}

{{--                <details>--}}
{{--                    <summary>--}}
{{--                        <div class="toggle-code">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">--}}
{{--                                <polyline points="16 18 22 12 16 6" />--}}
{{--                                <polyline points="8 6 2 12 8 18" />--}}
{{--                            </svg>--}}
{{--                            Toggle code--}}
{{--                        </div>--}}
{{--                    </summary>--}}
{{--                    <script src="https://gist.github.com/nielsVoogt/8cc4cd8ebc6e81c3f889f1b40037b0cc.js"></script>--}}
{{--                </details>--}}
{{--            </section>--}}

{{--            <section>--}}
{{--                <div class="href-target" id="validation"></div>--}}
{{--                <h1>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle">--}}
{{--                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />--}}
{{--                        <line x1="12" y1="9" x2="12" y2="13" />--}}
{{--                        <line x1="12" y1="17" x2="12.01" y2="17" />--}}
{{--                    </svg>--}}
{{--                    Field Validation--}}
{{--                </h1>--}}
{{--                <p>--}}
{{--                    Fields that have a <code>required</code> attribute can be valid or--}}
{{--                    invalid based on their value. When a user focuses on a invalid field--}}
{{--                    the styling is set back to default.--}}
{{--                </p>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Email</label>--}}
{{--                    <input type="email" placeholder="Your email" value="this is not a email adress" required />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Email</label>--}}
{{--                    <input type="email" placeholder="Your email" value="nice@forms.com" required />--}}
{{--                </div>--}}
{{--                <details>--}}
{{--                    <summary>--}}
{{--                        <div class="toggle-code">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">--}}
{{--                                <polyline points="16 18 22 12 16 6" />--}}
{{--                                <polyline points="8 6 2 12 8 18" />--}}
{{--                            </svg>--}}
{{--                            Toggle code--}}
{{--                        </div>--}}
{{--                    </summary>--}}
{{--                    <script src="https://gist.github.com/nielsVoogt/75ebf8c12ca420eb2089312a931ab4cf.js"></script>--}}
{{--                </details>--}}
{{--            </section>--}}

{{--            <section>--}}
{{--                <div class="href-target" id="date"></div>--}}
{{--                <h1>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">--}}
{{--                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />--}}
{{--                        <line x1="16" y1="2" x2="16" y2="6" />--}}
{{--                        <line x1="8" y1="2" x2="8" y2="6" />--}}
{{--                        <line x1="3" y1="10" x2="21" y2="10" />--}}
{{--                    </svg>--}}
{{--                    Date input--}}
{{--                </h1>--}}
{{--                <p>--}}
{{--                    Date fields show icons by default. The <code>month</code>,--}}
{{--                    <code>week</code> and <code>date</code> fields have a fixed min--}}
{{--                    width set at 14em. <code>time</code> is set at 7em.--}}
{{--                </p>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Month</label>--}}
{{--                    <input type="month" value="2018-05" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Week</label>--}}
{{--                    <input type="week" value="2017-W01" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Date</label>--}}
{{--                    <input type="date" value="2018-07-22" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Time</label>--}}
{{--                    <input type="time" value="13:30" />--}}
{{--                </div>--}}

{{--                <details>--}}
{{--                    <summary>--}}
{{--                        <div class="toggle-code">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">--}}
{{--                                <polyline points="16 18 22 12 16 6" />--}}
{{--                                <polyline points="8 6 2 12 8 18" />--}}
{{--                            </svg>--}}
{{--                            Toggle code--}}
{{--                        </div>--}}
{{--                    </summary>--}}
{{--                    <script src="https://gist.github.com/nielsVoogt/2ae279af287e520f545285b0d7c45828.js"></script>--}}
{{--                </details>--}}
{{--            </section>--}}

{{--            <section>--}}
{{--                <div class="href-target" id="other"></div>--}}
{{--                <h1>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server">--}}
{{--                        <rect x="2" y="2" width="20" height="8" rx="2" ry="2" />--}}
{{--                        <rect x="2" y="14" width="20" height="8" rx="2" ry="2" />--}}
{{--                        <line x1="6" y1="6" x2="6.01" y2="6" />--}}
{{--                        <line x1="6" y1="18" x2="6.01" y2="18" />--}}
{{--                    </svg>--}}
{{--                    Other input types--}}
{{--                </h1>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Textarea</label>--}}
{{--                    <textarea rows="5" placeholder="Your message"></textarea>--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Select</label>--}}
{{--                    <select>--}}
{{--                        <option>Please select a value</option>--}}
{{--                        <option>Option 1</option>--}}
{{--                        <option>Option 2</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>File upload</label>--}}
{{--                    <input type="file" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Range slider</label>--}}
{{--                    <input type="range" min="0" max="15" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Number</label>--}}
{{--                    <input type="number" placeholder="1234" />--}}
{{--                </div>--}}

{{--                <div class="nice-form-group">--}}
{{--                    <label>Color</label>--}}
{{--                    <input type="color" />--}}
{{--                </div>--}}

{{--                <details>--}}
{{--                    <summary>--}}
{{--                        <div class="toggle-code">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">--}}
{{--                                <polyline points="16 18 22 12 16 6" />--}}
{{--                                <polyline points="8 6 2 12 8 18" />--}}
{{--                            </svg>--}}
{{--                            Toggle code--}}
{{--                        </div>--}}
{{--                    </summary>--}}
{{--                    <script src="https://gist.github.com/nielsVoogt/f0480b1a2d0deda02138d61ec5c9f4d0.js"></script>--}}
{{--                </details>--}}
{{--            </section>--}}
{{--        </main>--}}
{{--    </div>--}}
    <link rel="stylesheet" href="{{asset('css/create.css')}}">
@endsection
