<?php

declare(strict_types=1);

return [
    'accepted'             => ':Attribute kabul edilmelidir.',
    'accepted_if'          => ':Attribute, :other değeri :value ise kabul edilmelidir.',
    'active_url'           => ':Attribute geçerli bir URL olmalıdır.',
    'after'                => ':Attribute mutlaka :date tarihinden sonra olmalıdır.',
    'after_or_equal'       => ':Attribute mutlaka :date tarihinden sonra veya aynı tarihte olmalıdır.',
    'alpha'                => ':Attribute sadece harflerden oluşmalıdır.',
    'alpha_dash'           => ':Attribute sadece harflerden, rakamlardan ve tirelerden oluşmalıdır.',
    'alpha_num'            => ':Attribute sadece harflerden ve rakamlardan oluşmalıdır.',
    'array'                => ':Attribute mutlaka bir dizi olmalıdır.',
    'ascii'                => ':Attribute yalnızca tek baytlık alfasayısal karakterler ve semboller içermelidir.',
    'before'               => ':Attribute mutlaka :date tarihinden önce olmalıdır.',
    'before_or_equal'      => ':Attribute mutlaka :date tarihinden önce veya aynı tarihte olmalıdır.',
    'between'              => [
        'array'   => ':Attribute mutlaka :min - :max arasında öge içermelidir.',
        'file'    => ':Attribute mutlaka :min - :max kilobayt arasında olmalıdır.',
        'numeric' => ':Attribute mutlaka :min - :max arasında olmalıdır.',
        'string'  => ':Attribute mutlaka :min - :max karakter arasında olmalıdır.',
    ],
    'boolean'              => ':Attribute sadece doğru veya yanlış olmalıdır.',
    'confirmed'            => ':Attribute tekrarı eşleşmiyor.',
    'current_password'     => 'Parola hatalı.',
    'date'                 => ':Attribute geçerli bir tarih değil.',
    'date_equals'          => ':Attribute mutlaka :date ile aynı tarihte olmalıdır.',
    'date_format'          => ':Attribute mutlaka :format biçiminde olmalıdır.',
    'decimal'              => 'The :attribute must have :decimal decimal places.',
    'declined'             => ':Attribute kabul edilmemektedir.',
    'declined_if'          => ':Attribute, :other değeri :value iken kabul edilmemektedir.',
    'different'            => ':Attribute ile :other mutlaka birbirinden farklı olmalıdır.',
    'digits'               => ':Attribute mutlaka :digits basamaklı olmalıdır.',
    'digits_between'       => ':Attribute mutlaka en az :min, en fazla :max basamaklı olmalıdır.',
    'dimensions'           => ':Attribute geçersiz resim boyutlarına sahip.',
    'distinct'             => ':Attribute alanı yinelenen bir değere sahip.',
    'doesnt_end_with'      => ':Attribute aşağıdakilerden biriyle bitemez: :values.',
    'doesnt_start_with'    => ':Attribute aşağıdakilerden biriyle başlamayabilir: :values.',
    'email'                => ':Attribute mutlaka geçerli bir e-posta adresi olmalıdır.',
    'ends_with'            => ':Attribute sadece şu değerlerden biriyle bitebilir: :values.',
    'enum'                 => 'Seçilen :attribute değeri geçersiz.',
    'exists'               => 'Seçili :attribute geçersiz.',
    'file'                 => ':Attribute mutlaka bir dosya olmalıdır.',
    'filled'               => ':Attribute mutlaka doldurulmalıdır.',
    'gt'                   => [
        'array'   => ':Attribute mutlaka :value sayısından daha fazla öge içermelidir.',
        'file'    => ':Attribute mutlaka :value kilobayt\'tan büyük olmalıdır.',
        'numeric' => ':Attribute mutlaka :value sayısından büyük olmalıdır.',
        'string'  => ':Attribute mutlaka :value karakterden uzun olmalıdır.',
    ],
    'gte'                  => [
        'array'   => ':Attribute mutlaka :value veya daha fazla öge içermelidir.',
        'file'    => ':Attribute mutlaka :value kilobayt\'tan büyük veya eşit olmalıdır.',
        'numeric' => ':Attribute mutlaka :value sayısından büyük veya eşit olmalıdır.',
        'string'  => ':Attribute mutlaka :value karakterden uzun veya eşit olmalıdır.',
    ],
    'image'                => ':Attribute mutlaka bir resim olmalıdır.',
    'in'                   => 'Seçili :attribute geçersiz.',
    'in_array'             => ':Attribute :other içinde mevcut değil.',
    'integer'              => ':Attribute mutlaka bir tam sayı olmalıdır.',
    'ip'                   => ':Attribute mutlaka geçerli bir IP adresi olmalıdır.',
    'ipv4'                 => ':Attribute mutlaka geçerli bir IPv4 adresi olmalıdır.',
    'ipv6'                 => ':Attribute mutlaka geçerli bir IPv6 adresi olmalıdır.',
    'json'                 => ':Attribute mutlaka geçerli bir JSON içeriği olmalıdır.',
    'lowercase'            => ':Attribute küçük harf olmalıdır.',
    'lt'                   => [
        'array'   => ':Attribute mutlaka :value sayısından daha az öge içermelidir.',
        'file'    => ':Attribute mutlaka :value kilobayt\'tan küçük olmalıdır.',
        'numeric' => ':Attribute mutlaka :value sayısından küçük olmalıdır.',
        'string'  => ':Attribute mutlaka :value karakterden kısa olmalıdır.',
    ],
    'lte'                  => [
        'array'   => ':Attribute mutlaka :value veya daha az öge içermelidir.',
        'file'    => ':Attribute mutlaka :value kilobayt\'tan küçük veya eşit olmalıdır.',
        'numeric' => ':Attribute mutlaka :value sayısından küçük veya eşit olmalıdır.',
        'string'  => ':Attribute mutlaka :value karakterden kısa veya eşit olmalıdır.',
    ],
    'mac_address'          => ':Attribute geçerli bir MAC adresi olmalıdır.',
    'max'                  => [
        'array'   => ':Attribute en fazla :max öge içerebilir.',
        'file'    => ':Attribute en fazla :max kilobayt olabilir.',
        'numeric' => ':Attribute en fazla :max olabilir.',
        'string'  => ':Attribute en fazla :max karakter olabilir.',
    ],
    'max_digits'           => ':Attribute en fazla :max basamak içermelidir.',
    'mimes'                => ':Attribute mutlaka :values biçiminde bir dosya olmalıdır.',
    'mimetypes'            => ':Attribute mutlaka :values biçiminde bir dosya olmalıdır.',
    'min'                  => [
        'array'   => ':Attribute en az :min öge içerebilir.',
        'file'    => ':Attribute en az :min kilobayt olabilir.',
        'numeric' => ':Attribute en az :min olabilir.',
        'string'  => ':Attribute en az :min karakter olabilir.',
    ],
    'min_digits'           => ':Attribute en az :min basamak içermelidir.',
    'multiple_of'          => ':Attribute, :value\'nin katları olmalıdır',
    'not_in'               => 'Seçili :attribute geçersiz.',
    'not_regex'            => ':Attribute biçimi geçersiz.',
    'numeric'              => ':Attribute mutlaka bir sayı olmalıdır.',
    'password'             => [
        'letters'       => ':Attribute en az bir harf içermelidir.',
        'mixed'         => ':Attribute en az bir büyük harf ve bir küçük harf içermelidir.',
        'numbers'       => ':Attribute en az bir sayı içermelidir.',
        'symbols'       => ':Attribute en az bir sembol içermelidir.',
        'uncompromised' => 'Verilen :attribute bir veri sızıntısında ortaya çıktı. Lütfen farklı bir :attribute seçin.',
    ],
    'present'              => ':Attribute mutlaka mevcut olmalıdır.',
    'prohibited'           => ':Attribute alanı kısıtlanmıştır.',
    'prohibited_if'        => ':Other alanının değeri :value ise :attribute alanına veri girişi yapılamaz.',
    'prohibited_unless'    => ':Other alanı :value değerlerinden birisi değilse :attribute alanına veri girişi yapılamaz.',
    'prohibits'            => ':Attribute alanı :other alanının mevcut olmasını yasaklar.',
    'regex'                => ':Attribute biçimi geçersiz.',
    'required'             => ':Attribute mutlaka gereklidir.',
    'required_array_keys'  => ':Attribute değeri şu verileri içermelidir: :values.',
    'required_if'          => ':Attribute :other :value değerine sahip olduğunda mutlaka gereklidir.',
    'required_if_accepted' => ':Attribute alanı, :other kabul edildiğinde gereklidir.',
    'required_unless'      => ':Attribute :other :values değerlerinden birine sahip olmadığında mutlaka gereklidir.',
    'required_with'        => ':Attribute :values varken mutlaka gereklidir.',
    'required_with_all'    => ':Attribute herhangi bir :values değeri varken mutlaka gereklidir.',
    'required_without'     => ':Attribute :values yokken mutlaka gereklidir.',
    'required_without_all' => ':Attribute :values değerlerinden herhangi biri yokken mutlaka gereklidir.',
    'same'                 => ':Attribute ile :other aynı olmalıdır.',
    'size'                 => [
        'array'   => ':Attribute mutlaka :size ögeye sahip olmalıdır.',
        'file'    => ':Attribute mutlaka :size kilobayt olmalıdır.',
        'numeric' => ':Attribute mutlaka :size olmalıdır.',
        'string'  => ':Attribute mutlaka :size karakterli olmalıdır.',
    ],
    'starts_with'          => ':Attribute sadece şu değerlerden biriyle başlayabilir: :values.',
    'string'               => ':Attribute mutlaka bir metin olmalıdır.',
    'timezone'             => ':Attribute mutlaka geçerli bir saat dilimi olmalıdır.',
    'ulid'                 => ':Attribute geçerli bir ULID olmalıdır.',
    'unique'               => ':Attribute zaten alınmış.',
    'uploaded'             => ':Attribute yüklemesi başarısız.',
    'uppercase'            => ':Attribute büyük harf olmalıdır.',
    'url'                  => ':Attribute biçimi geçersiz.',
    'uuid'                 => ':Attribute mutlaka geçerli bir UUID olmalıdır.',
    'attributes'           => [
        'address'                  => 'adres',
        'age'                      => 'yaş',
        'amount'                   => 'tutar',
        'area'                     => 'alan',
        'available'                => 'mevcut',
        'birthday'                 => 'doğum günü',
        'body'                     => 'gövde',
        'city'                     => 'şehir',
        'content'                  => 'i̇çerik',
        'country'                  => 'ülke',
        'created_at'               => 'oluşturulduğunda',
        'creator'                  => 'yaratıcı',
        'current_password'         => 'mevcut şifre',
        'date'                     => 'tarih',
        'date_of_birth'            => 'doğum tarihi',
        'day'                      => 'gün',
        'deleted_at'               => 'silindi',
        'description'              => 'açıklama',
        'district'                 => 'semt',
        'duration'                 => 'süre',
        'email'                    => 'e-posta adresi',
        'excerpt'                  => 'alıntı',
        'filter'                   => 'filtre',
        'first_name'               => 'adı',
        'gender'                   => 'cinsiyet',
        'group'                    => 'grup',
        'hour'                     => 'saat',
        'image'                    => 'resim',
        'last_name'                => 'soyadı',
        'lesson'                   => 'ders',
        'line_address_1'           => 'hat adresi 1',
        'line_address_2'           => 'hat adresi 2',
        'message'                  => 'ileti',
        'middle_name'              => 'ikinci ad',
        'minute'                   => 'dakika',
        'mobile'                   => 'cep telefonu',
        'month'                    => 'ay',
        'name'                     => 'adı',
        'national_code'            => 'ulusal kod',
        'number'                   => 'sayı',
        'password'                 => 'parola',
        'password_confirmation'    => 'parola (tekrar)',
        'phone'                    => 'telefon',
        'photo'                    => 'fotoğraf',
        'postal_code'              => 'posta kodu',
        'price'                    => 'fiyat',
        'province'                 => 'bölge',
        'recaptcha_response_field' => 'recaptcha yanıt alanı',
        'remember'                 => 'hatırlamak',
        'restored_at'              => 'restore',
        'result_text_under_image'  => 'resmin altındaki sonuç metni',
        'role'                     => 'rol',
        'second'                   => 'saniye',
        'sex'                      => 'cinsiyet',
        'short_text'               => 'kısa metin',
        'size'                     => 'boyut',
        'state'                    => 'durum',
        'street'                   => 'sokak',
        'student'                  => 'öğrenci',
        'subject'                  => 'ders',
        'teacher'                  => 'öğretmen',
        'terms'                    => 'şartlar',
        'test_description'         => 'test açıklaması',
        'test_locale'              => 'yerel ayar',
        'test_name'                => 'deneme adı',
        'text'                     => 'metin',
        'time'                     => 'zaman',
        'title'                    => 'unvan',
        'updated_at'               => 'güncellendi',
        'username'                 => 'kullanıcı adı',
        'year'                     => 'yıl',
    ],
];
