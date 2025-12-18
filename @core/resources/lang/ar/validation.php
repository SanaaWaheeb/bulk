<?php

return [

    'required' => 'حقل :attribute مطلوب.',
    'string'   => 'حقل :attribute يجب أن يكون نصاً.',
    'min'      => [
        'string' => 'حقل :attribute يجب ألا يقل عن :min أحرف.',
    ],

    'attributes' => [
        'username' => 'اسم المستخدم',
        'password' => 'كلمة المرور',
    ],
    
    // Validation
    'phone_required'        => 'رقم الجوال مطلوب.',
    'phone_digits'          => 'رقم الجوال يجب أن يتكوّن من ٩ أرقام.',
    'phone_must_start_5'    => 'رقم الجوال يجب أن يبدأ بالرقم 5.',

    // User status
    'not_registered'        => 'أنت غير مسجل. الرجاء إنشاء حساب.',
    'not_registered_phone'  => 'أنت غير مسجل بالرقم :phone، يُرجى إنشاء حساب.',

    // Twilio / sending code
    'send_code_failed'          => 'فشل في إرسال رمز التحقق.',
    'send_code_failed_error'    => 'فشل إرسال الرمز: :error',

    // Success
    'code_sent_to'          => 'تم إرسال رمز التحقق إلى :phone',
    'code_sent_success'     => 'تم إرسال الرمز بنجاح',
    
    'success_title'  => 'نجاح!',
    'success_button' => 'حسناً',
    'error_title'    => 'خطأ!',
    'error_button'   => 'إغلاق',

];
