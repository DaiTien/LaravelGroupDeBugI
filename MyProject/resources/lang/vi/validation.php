<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute phải được chấp nhận.',
    'active_url' => ':attribute không phải là một URL hợp lệ.',
    'after' => ':attribute phải là ngày sau ngày hiện tại. :date',
    'after_or_equal' => 'The :attribute phải là ngày sau hoặc bằng ngày hiện tại. :date',
    'alpha' => ':attribute chỉ có thể chứa các chữ cái.',
    'alpha_dash' => ':attribute chỉ có thể chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => ':attribute chỉ có thể chứa các chữ cái và số.',
    'array' => ':attribute phải là một mảng.',
    'before' => ':attribute phải là ngày trước ngày hiện tại. :date',
    'before_or_equal' => ':attribute hải là một ngày trước hoặc bằng ngày hiện tại. :date',
    'between' => [
        'numeric' => ':attribute phải nằm giữa: min và: max.',
        'file' => ':attribute phải nằm trong khoảng: min và: max kilobyte.',
        'string' => ':attribute phải nằm giữa các ký tự: min và: max.',
        'array' => ':attribute phải có giữa các mục: min và: max.',
    ],
    'boolean' => ':attribute phải đúng hoặc sai.',
    'confirmed' => ':attribute Xác nhận thuộc tính không khớp.',
    'date' => ':attribute không phải là ngày hợp lệ.',
    'date_equals' => ':attribute phải là một ngày. :date',
    'date_format' => ':attribute không khớp với định dạng :format.',
    'different' => ':attribute và :other phải khác.',
    'digits' => ':attribute phải là :digits các chữ số.',
    'digits_between' => ':attribute phải nằm giữa :min và :max các chữ số.',
    'dimensions' => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct' => ':attribute có giá trị trùng lặp.',
    'email' => ':attribute phải là một địa chỉ email hợp lệ.',
    'ends_with' => ':attribute phải kết thúc bằng một trong các giá trị sau: :values.',
    'exists' => 'lựa chọn :attribute không hợp lệ.',
    'file' => ':attribute phải là 1 file.',
    'filled' => ':attribute phải có một giá trị.',
    'gt' => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file' => ':attribute phải lớn hơn :value kilobytes.',
        'string' => ':attribute phải lớn hơn :value ký tự.',
        'array' => ':attribute phải có nhiều hơn :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file' => ':attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải lớn hơn hoặc bằng :value ký tự.',
        'array' => ':attribute phải có :value items trở lên.',
    ],
    'image' => ':attribute phải là một hình ảnh.',
    'in' => 'lựa chọn :attribute không hợp lệ.',
    'in_array' => ':attribute không tồn tại trong :other.',
    'integer' => ':attribute phải là một số nguyên.',
    'ip' => ':attribute phải là 1 địa chỉ IP hợp lệ.',
    'ipv4' => ':attribute phải là địa chỉ IPv4 hợp lệ.',
    'ipv6' => ':attribute phải là địa chỉ IPv6 hợp lệ.',
    'json' => ':attribute phải là một chuỗi JSON hợp lệ.',
    'lt' => [
        'numeric' => ':attribute phải nhỏ hơn :value.',
        'file' => ':attributephải nhỏ hơn :value kilobytes.',
        'string' => ':attribute phải nhỏ hơn :value ký tự.',
        'array' => ':attribute phải nhỏ hơn :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'file' => ':attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải nhỏ hơn hoặc bằng :value ký tự.',
        'array' => ':attribute phải nhỏ hơn hoặc bằng :value items.',
    ],
    'max' => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file' => ':attribute không được lớn hơn :max kilobytes.',
        'string' => ':attribute không được lớn hơn :max ký tự.',
        'array' => ':attribute không được lớn hơn :max items.',
    ],
    'mimes' => ':attribute phải là một tệp có kiểu: :values.',
    'mimetypes' => ':attribute phải là một tệp có kiểu: :values.',
    'min' => [
        'numeric' => ':attribute tối thiểu phải là :min.',
        'file' => ':attribute tối thiểu phải là :min kilobytes.',
        'string' => ':attribute tối thiểu phải là :min ký tự.',
        'array' => ':attribute tối thiểu phải là :min items.',
    ],
    'not_in' => 'lựa chọn :attribute không hợp lệ.',
    'not_regex' => ':attribute định dạng không hợp lệ.',
    'numeric' => ':attribute phải là một số.',
    'password' => 'Mật khẩu không đúng.',
    'present' => ':attribute phải có.',
    'regex' => ':attribute không được định dạng.',
    'required' => ':attribute là bắt buộc.',
    'required_if' => ':attribute là bắt buộc khi :other là :value.',
    'required_unless' => ':attribute là bắt buộc trừ khi :other không nằm trong :values.',
    'required_with' => ':attribute là bắt buộc khi :values có giá trị.',
    'required_with_all' => ':attribute là bắt buộc khi :values có giá trị.',
    'required_without' => ':attribute là bắt buộc khi :values không có giá trị.',
    'required_without_all' => ':attribute là bắt buộc khi không có giá trị nào :values trong số.',
    'same' => ':attribute và :other phải khớp.',
    'size' => [
        'numeric' => ':attribute phải là :size.',
        'file' => ':attribute phải là :size kilobytes.',
        'string' => ':attribute phải là :size ký tự.',
        'array' => ':attribute phải là :size items.',
    ],
    'starts_with' => ':attribute  phải bắt đầu bằng một trong các giá trị sau: :values.',
    'string' => ':attribute phải là một kiểu chuỗi.',
    'timezone' => ':attribute phải là một vùng hợp lệ.',
    'unique' => ':attribute đã được sử dụng.',
    'uploaded' => ':attribute không tải lên được.',
    'url' => ':attribute địng dạng không hợp lệ.',
    'uuid' => ':attribute phải là một UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
