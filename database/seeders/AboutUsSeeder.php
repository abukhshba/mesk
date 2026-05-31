<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::firstOrCreate(['id' => 1], [
            'title_ar' => 'شركة المسك للصناعة',
            'title_en' => 'ALMISK COMPANY FOR INDUSTRY',
            'description_ar' => ' ُتعـد شـركة المسـك للصناعـة شـركة سـعودية حديثـة فـي مجـال األسـمدة الزراعيـة، تقـدم مجموعـة واسـعة ومتنوعـة مـن المنتجـات التـي ُتلــبي احتياجات القــطاع الزراــعي وتواكب متطلــبات التنمــية الزراعــية الحديــثة ً وتوفــر الشــركة حلــوًال متكاملــة تشــمل األســمدة الذوابــة، واألســمدة المحببــة، واألســمدة الســائلة، بمــا يخــدم مختلــف األنشــطة الزراعيــة ويسـهم فـي دعـم مراحـل النمـو واإلنتـاج بكفـاءة عاليـة. كمـا تحـرص علـى الجمـع بيـن الجـودة، والتنـوع، والفعاليـة لتقديـم منتجـات تدعـم تحــسين خصوــبة الترــبة، وتــعزز نــمو النباــتات، وتــسهم ــفي رــفع اإلنتاجــية ً وانطالًقــا مـن كونهــا شـركة وطنيــة، تلتــزم شـركة المسـك للصناعــة بتقديـم حلـول زراعيــة تتماشــى مــع رؤيــة المملكـة العربيــة السـعودية ،2030 مـن خالل دعـم التوجـه نحـو قطـاع زراعـي أكثـر اسـتدامة وكفـاءة، والمسـاهمة فـي تحقيـق مسـتهدفات التطـور واالبتـكار فـي هـذا المــجال الحــيوي كمـا تسـتهدف الشـركة تلبيـة احتياجـات السـوق المحلـي واال ً نـطالق نحـو أسـواق التصديـر، انطالًقـا مـن رؤيـة طموحـة تسـعى إلـى توسـيع نــطاق حضورــها وتعزــيز مكانتــها كــمزود موــثوق للحــلول الزراعــية داــخل المملــكة وخارجــها',
            'description_en' => 'Al modern of requirements the with pace keep and sector agricultural the of needs the meet that products of range .development agricultural wide a serving ,fertilizers liquid and ,granular ,soluble-water including solutions integrated provides company The .efficiency high with stages production and growth various supporting and activities agricultural of range ,fertility soil improve help that products deliver to effectiveness and ,diversity ,quality combining to committed is It .productivity enhance and ,growth plant promote Saudi with align that solutions agricultural providing to dedicated is Industry Musk Al ,company Saudi national a As contributing while sector agricultural efficient and sustainable more a of development the supporting 2030, Vision .field vital this in innovation and progress of goals the to to vision ambitious an by driven ,markets export into expand and market local the serve to aims also company The Kingdom the within solutions agricultural of provider trusted a as position its strengthen and presence its broaden .beyond an',
            'mission_ar' => 'مهمتنا تقديم حلول زراعية متكاملة وعالية الجودة تساعد المزارعين على تحقيق أعلى إنتاجية مع الحفاظ على البيئة.',
            'mission_en' => 'Our mission is to provide comprehensive and high-quality agricultural solutions that help farmers achieve maximum productivity while preserving the environment.',
            'vision_ar' => 'رؤيتنا أن نكون الشركة الأولى في المملكة العربية السعودية في مجال توريد وتوزيع المستلزمات الزراعية.',
            'vision_en' => 'Our vision is to be the number one company in Saudi Arabia in the field of agricultural supplies distribution.',
        ]);
    }
}
