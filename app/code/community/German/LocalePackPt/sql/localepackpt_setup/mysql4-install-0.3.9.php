<?php
/**
 * @category  German
 * @package   German_LocalePack
 * @authors   MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>
 * @developer MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>  
 * @version   0.3.9
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
$installer = $this;

$installer->startSetup();

$blockContent = <<<EOD
Em caso de dúvidas, entre em contato conosco em
per Email <a href="mailto:{{var store_email}}">{{var store_email}}</a>,
pelo telefone <a href="tel:{{var store_phone}}">{{var store_phone}}</a>,
via <a title="Minha página serviços no Skype" href="skype:mein.laden?chat" target="_blank">Skype-Chat</a> (Nome de usuário: mein.laden)
ou pelo Facebook nossa fanpage <a title="A página meu fã no Facebook" href="http://www.facebook.com/mein.laden" target="_blank">Um fansite</a>.
EOD;

$storeId = 7;

$staticBlocks = array(
    array(
        'title'         => 'eMail Template Say Hello (pt)',
        'identifier'    => 'email_template_say_hello',
        'content'       => 'Caro senhor/senhora',
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Contact (pt)',
        'identifier'    => 'email_template_contact',
        'content'       => $blockContent,
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Say Bye (pt)',
        'identifier'    => 'email_template_say_bye',
        'content'       => 'Obrigado novamente,',
        'is_active'     => 0,
        'stores'        => array($storeId)
    )
);

/**
 * Insert default blocks
 */
foreach ($staticBlocks as $data) {
    try {
        Mage::getModel('cms/block')->setData($data)->save();
    } catch (Exception $e) {
        # To prevent exception "A block identifier with the same properties already exists
        # in the selected store." in "app:code:core:Mage:Cms:Model:Resource:Block.php"
#        throw new Exception("Oops, mi error in PT German LocalePack");
    }
}

$installer->endSetup();

?>
