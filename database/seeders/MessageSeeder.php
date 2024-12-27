<?php

namespace Database\Seeders;

use App\Enums\MessageTypeEnum;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    private const MESSAGES = [
        [
            'type' => MessageTypeEnum::START_MESSAGE->value,
            'text' => "مرحبا بكم في بوط الوكلاء Linebet partners"
        ],
        [
            'type' => MessageTypeEnum::SECOND_MESSAGE->value,
            'text' => "    السلام عليكم للحصول على كود برومو يرجى اتباع الخطوات التالية :
\n
سجل هنا
\n
https://lb-aff.com/L?tag=d_1921219m_22613c_ref&site=1921219&ad=22613&r=sign-up/
و إبعثلي سكرين شوت بعد تسجيل .\n
    أرسل لي كود برومو الذي تريد  و إيمايل مسجل به ؟"
        ],
        [
            'type' => MessageTypeEnum::SECOND_MESSAGE->value,
            'text' => "للحصول على حساب تجريبي يجب :
\n
1. ارسال قناتك التي ستروج بها بالحساب التجريبي
\n
2. يكون لديك خمس تسجلات مع ايداع بالبروموكود الخاص بك"
        ],
        [
            'type' => MessageTypeEnum::SECOND_MESSAGE->value,
            'text' => "1.يجب ارسال رقم حساب الوكلاء الخاص بك\n
2.ارسال سكرين شوت للصفحه الاولى لحسابك الوكلاء\n
3.قم بانشاء حساب اللاعب الذي يرسل اليه الاموال بدون برومو كود و تختار عملة واحدة لا يتم فيه اي مراهنات ، و تعمر فيه كل معلومات إسم لقب تاريخ الميلاد ، معلومات بطاقة الهوية ، الإيمايل او رقم هاتف . هذا الحساب لا يقوم فيه بمراهنات من فضلكم .\n
اي معلومات ناقصة لا يتم إرسال نقود .\n
يجب تعبأة كل خانات حساب لاعب .\n
شكرا .\n
ثم اكتب رقم حساب اللاعب."
        ],
        [
            'type' => MessageTypeEnum::SECOND_MESSAGE->value,
            'text' => "للحصول على موبي كاش يجب:\n
1. تسجيل والحصول على برومو كود خاص بك.\n
2. يجب تعبئه حسابك المربوط موبي كاش بمبلغ لا يقل عن 100 دولار.\n
3. لو انت موافق على هذه الشروط اكتب اوكي حتى نكمل."
        ],
        [
            'type' => MessageTypeEnum::SECOND_MESSAGE->value,
            'text' => "للحصول على خدمه بنكيه يجب ان تكون من افضل وكلاء البرومو كود\n
لو تريد برومو كود خاص بك اكتب اوكي"
        ],
        [
            'type' => MessageTypeEnum::LAST_MESSAGE->value,
            'text' => "يتم حاليا النظر في طلبك يرجى الانتظار حتى يتواصل معك المدير"
        ]
    ];

    public function run(): void
    {
        foreach (self::MESSAGES as $message) {
            Message::query()->create($message);
        }
    }
}
