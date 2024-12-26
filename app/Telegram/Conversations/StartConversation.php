<?php

namespace App\Telegram\Conversations;

use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Conversations\InlineMenu;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;

class StartConversation extends InlineMenu
{
    public function start(Nutgram $bot)
    {
        $this->menuText("مرحبا بكم في بوط الوكلاء Linebet partners")
            ->addButtonRow(InlineKeyboardButton::make("1. التسجيل في حساب الوكلاء والحصول على بروموكاد خاص بيك.", callback_data: "null@button1"))
            ->addButtonRow(InlineKeyboardButton::make("2.الحصول على حساب ديمو (حساب تجريبي)؟", callback_data: "null@button2"))
            ->addButtonRow(InlineKeyboardButton::make("3.تفعيل سحب الارباح وربط الحساب", callback_data: "null@button3"))
            ->addButtonRow(InlineKeyboardButton::make("4.الحصول على موبي كاش", callback_data: "null@button4"))
            ->addButtonRow(InlineKeyboardButton::make("5.الحصول على خدمه بنكيه", callback_data: "null@button5"))
            ->showMenu();
    }

    public function button1(Nutgram $bot)
    {
        $this->clearButtons();

        $text = "Video +
    السلام عليكم للحصول على كود برومو يرجى اتباع الخطوات التالية :
\n\n
سجل هنا
\n\n
https://lb-aff.com/L?tag=d_1921219m_22613c_ref&site=1921219&ad=22613&r=sign-up/
و إبعثلي سكرين شوت بعد تسجيل .\n\n
    أرسل لي كود برومو الذي تريد  و إيمايل مسجل به ؟";

        $bot->sendMessage($text);

        $this->next('finishMessage');
    }

    public function button2(Nutgram $bot)
    {
        $this->clearButtons();

        $text = "للحصول على حساب تجريبي يجب :\n
1. ارسال قناتك التي ستروج بها بالحساب التجريبي\n
2. يكون لديك خمس سجلات مع ايداع بالبروموكود الخاص بك";

        $bot->sendMessage($text);

        $this->next('finishMessage');
    }

    public function button3(Nutgram $bot)
    {
        $this->clearButtons();

        $text = "1.يجب ارسال رقم حساب الوكلاء الخاص بك\n
2.ارسال سكرين شوت للصفحه الاولى لحسابك الوكلاء\n
3.قم بانشاء حساب اللاعب الذي يرسل اليه الاموال بدون برومو كود و تختار عملة واحدة لا يتم فيه اي مراهنات ، و تعمر فيه كل معلومات إسم لقب تاريخ الميلاد ، معلومات بطاقة الهوية ، الإيمايل او رقم هاتف . هذا الحساب لا يقوم فيه بمراهنات من فضلكم .\n
اي معلومات ناقصة لا يتم إرسال نقود .\n
يجب تعبأة كل خانات حساب لاعب .\n
شكرا .\n
ثم اكتب رقم حساب اللاعب.";

        $bot->sendMessage($text);

        $this->next('finishMessage');
    }

    public function button4(Nutgram $bot)
    {
        $this->clearButtons();

        $text = "للحصول على موبي كاش يجب:\n
1. تسجيل والحصول على برومو كود خاص بك.\n
2. يجب تعبئه حسابك المربوط موبي كاش بمبلغ لا يقل عن 100 دولار.\n
3. لو انت موافق على هذه الشروط اكتب اوكي حتى نكمل.";

        $bot->sendMessage($text);

        $this->next('finishMessage');
    }

    public function button5(Nutgram $bot)
    {
        $this->clearButtons();

        $text = "للحصول على خدمه بنكيه يجب ان تكون من افضل وكلاء البرومو كود\n
لو تريد برومو كود خاص بك اكتب اوكي";

        $bot->sendMessage($text);

        $this->next('finishMessage');
    }

    public function finishMessage(Nutgram $bot)
    {
        $text = "يتم حاليا النظر في طلبك يرجى الانتظار حتى يتواصل معك المدير";

        $bot->sendMessage($text);

        $this->end();
    }
}
