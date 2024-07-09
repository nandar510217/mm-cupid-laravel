<!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Activation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
      </head>
      <body>
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="container" style="width: 500px; margin: 20px;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="me-5"><h3>Please verify your email</h3></div>
                    <div class="" >
                        <img class="rounded-circle shadow" style="width: 50px;" src="{{ asset('storage/images' . $mailData['setting']->company_logo)}}" alt="">
                    </div>
                </div>
                <div class="my-4">
                    <div class="fs-5">Please take a second to make sure we've got your email right.</div>
                    <div class="text-center" style="margin: 35px 0;">
                        <a href="{{ url('/email-confirm?code=' . $mailData['member']->email_confirm_code)}}"  target="_blank"><button class="btn btn-danger fw-bold fs-6 py-2"  style="width: 90%;">Confirm your email</button></a>
                    </div>
                    <div class="fs-5">Didn't sign up for <span class="text-danger fw-bold">{{$mailData['setting']->company_name}}</span> ?<span class="text-primary"> Let us know.</span></div>
                </div>
                <div class="mt-5 bg-body-secondary p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <img class="rounded-circle shadow" style="width: 55px;" src="" alt="">
                        </div>
                        <div>
                            <h3 class="text-danger fw-bold">{{$mailData['setting']->company_name}}</h3>
                        </div>
                    </div>
                    <div class="mb-1">
                        test
                    </div>
                    <div style="font-size: 13px;">
                        <a href="" class="text-secondary">Help Center</a> .
                        <a href="" class="text-secondary">Privacy Policy</a> .
                        <a href="" class="text-secondary">Terms & Conditions</a> 
                        <a href="" class="text-secondary d-block">Unsubscribe $company_email from this email</a>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      </body>
      </html>