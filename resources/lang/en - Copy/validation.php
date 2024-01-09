<?php

return array (
    "accepted" => "يجب قبول السمة:.",
    "active_url" => "السمة: ليست عنوان URL صالحًا.",
    "after" => "يجب أن تكون السمة: تاريخًا بعد:date.",
    "after_or_equal" => "يجب أن تكون السمة: تاريخًا بعد أو يساوي:date.",
    "alpha" => "قد تحتوي السمة: على أحرف فقط.",
    "alpha_dash" => "يمكن أن تحتوي السمة: فقط على أحرف وأرقام وشرطات وشرطات سفلية.",
    "alpha_num" => "يجب أن تحتوي السمة: على أحرف وأرقام فقط.",
    "array" => "يجب أن تكون السمة: مصفوفة.",
    "before" => "يجب أن تكون السمة: تاريخًا قبل:date.",
    "before_or_equal" => "يجب أن تكون السمة: تاريخًا قبل أو يساوي:date.",
  'between' =>
  array (
    "numeric" => "يجب أن تكون السمة: بين:min و:max.",
         "file" => "يجب أن تكون السمة: بين:min و:max كيلو بايت.",
         "string" => "يجب أن تكون السمة: بين أحرف:min و:max.",
         "array" => "يجب أن تحتوي السمة: على عناصر بين:min و:max."
  ),
  "boolean" => "يجب أن يكون حقل السمة: صحيحًا أو خطأ.",
  "confirmed" => "تأكيد السمة: غير متطابق.",
  "date" => "السمة: ليست تاريخًا صالحًا.",
  "date_equals" => "يجب أن تكون السمة: تاريخًا مساويًا لـ:date.",
  "date_format" => "السمة: لا تتطابق مع التنسيق:format.",
  "different" => "يجب أن تكون السمة: و:other مختلفة.",
  "digits" => "يجب أن تكون السمة: أرقام أرقام.",
  "digits_between" => "يجب أن تكون السمة بين رقمين:min و:max.",
  "dimensions" => "تحتوي السمة : على أبعاد صورة غير صالحة.",
  "distinct" => "يحتوي الحقل :attribute على قيمة مكررة.",
  "email" => "يجب أن تكون السمة عنوان بريد إلكتروني صالحًا.",
  "ends_with" => "يجب أن تنتهي السمة بإحدى القيم التالية::",
  "exists" => "السمة المحددة غير صالحة.",
  "file" => "يجب أن تكون السمة ملفًا.",
  "filled" => "يجب أن يحتوي حقل :attribute على قيمة.",
  'gt' =>
  array (
    "numeric" => "يجب أن تكون السمة: أكبر من القيمة:.",
    "file" => "يجب أن تكون السمة أكبر من القيمة بالكيلوبايت.",
    "string" => "يجب أن تكون السمة: أكبر من أحرف القيمة:.",
    "array" => "يجب أن تحتوي السمة: على أكثر من عناصر القيمة:."
  ),
  'gte' =>
  array (
    "numeric" => "يجب أن تكون السمة: أكبر من أو تساوي: القيمة.",
    "file" => "يجب أن تكون السمة: أكبر من أو تساوي: القيمة بالكيلوبايت.",
    "string" => "يجب أن تكون السمة أكبر من أو تساوي أحرف القيمة.",
    "array" => "يجب أن تحتوي السمة: على عناصر قيمة أو أكثر."
  ),
  "image" => "يجب أن تكون السمة: صورة.",
  "in" => "السمة المحددة غير صالحة.",
  "in_array" => "حقل :attribute غير موجود في :other.",
  "integer" => "يجب أن تكون السمة: عددًا صحيحًا.",
  "ip" => "يجب أن تكون السمة عنوان IP صالحًا.",
  "ipv4" => "يجب أن تكون السمة: عنوان IPv4 صالحًا.",
  "ipv6" => "يجب أن تكون السمة: عنوان IPv6 صالحًا.",
  "json" => "يجب أن تكون السمة: سلسلة JSON صالحة.",
  'lt' =>
  array (
    'numeric' => 'The :attribute must be less than :value.',
    'file' => 'The :attribute must be less than :value kilobytes.',
    'string' => 'The :attribute must be less than :value characters.',
    'array' => 'The :attribute must have less than :value items.',
  ),
  'lte' =>
  array (
    'numeric' => 'The :attribute must be less than or equal :value.',
    'file' => 'The :attribute must be less than or equal :value kilobytes.',
    'string' => 'The :attribute must be less than or equal :value characters.',
    'array' => 'The :attribute must not have more than :value items.',
  ),
  'max' =>
  array (
    'numeric' => 'The :attribute may not be greater than :max.',
    'file' => 'The :attribute may not be greater than :max kilobytes.',
    'string' => 'The :attribute may not be greater than :max characters.',
    'array' => 'The :attribute may not have more than :max items.',
  ),
  'mimes' => 'The :attribute must be a file of type: :values.',
  'mimetypes' => 'The :attribute must be a file of type: :values.',
  'min' =>
  array (
    'numeric' => 'The :attribute must be at least :min.',
    'file' => 'The :attribute must be at least :min kilobytes.',
    'string' => 'The :attribute must be at least :min characters.',
    'array' => 'The :attribute must have at least :min items.',
  ),
  'not_in' => 'The selected :attribute is invalid.',
  'not_regex' => 'The :attribute format is invalid.',
  'numeric' => 'The :attribute must be a number.',
  'present' => 'The :attribute field must be present.',
  'regex' => 'The :attribute format is invalid.',
  'required' => 'The :attribute field is required.',
  'required_if' => 'The :attribute field is required when :other is :value.',
  'required_unless' => 'The :attribute field is required unless :other is in :values.',
  'required_with' => 'The :attribute field is required when :values is present.',
  'required_with_all' => 'The :attribute field is required when :values are present.',
  'required_without' => 'The :attribute field is required when :values is not present.',
  'required_without_all' => 'The :attribute field is required when none of :values are present.',
  'same' => 'The :attribute and :other must match.',
  'size' =>
  array (
    'numeric' => 'The :attribute must be :size.',
    'file' => 'The :attribute must be :size kilobytes.',
    'string' => 'The :attribute must be :size characters.',
    'array' => 'The :attribute must contain :size items.',
  ),
  'starts_with' => 'The :attribute must start with one of the following: :values',
  'string' => 'The :attribute must be a string.',
  'timezone' => 'The :attribute must be a valid zone.',
  'unique' => 'The :attribute has already been taken.',
  'uploaded' => 'The :attribute failed to upload.',
  'url' => 'The :attribute format is invalid.',
  'uuid' => 'The :attribute must be a valid UUID.',
  'custom' =>
  array (
    'attribute-name' =>
    array (
      'rule-name' => 'custom-message',
    ),
  ),
);
