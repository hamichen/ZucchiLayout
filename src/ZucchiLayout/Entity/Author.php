<?php
/**
 * ZucchiLayout (http://zucchi.co.uk)
 *
 * @link      http://github.com/zucchi/ZucchiLayout for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zucchi Limited. (http://zucchi.co.uk)
 * @license   http://zucchi.co.uk/legals/bsd-license New BSD License
 */
namespace ZucchiLayout\Entity;

use ZucchiDoctrine\Entity\AbstractEntity;
use ZucchiDoctrine\Entity\ChangeTrackingTrait;
use ZucchiDoctrine\Behavior\Timestampable\TimestampableTrait;

use Zucchi\Debug\Debug;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

use Zend\Form\Annotation AS Form;

/**
 * 
 * @author Matt Cockayne <matt@zucchi.co.uk>
 * @package ZucchiLayout
 * @subpackage Entity
 * @property int $id
 * @property string $identity
 * @property string $credential
 * @property string $forename
 * @property string $email
 * @property bool $locked
 * @property DateTime createdAt
 * @property DateTime updatedAt
 * 
 * @ORM\Entity
 * @ORM\Table(name="zucchi_layout_authors")
 * @ORM\HasLifecycleCallbacks
 * @Form\Name("layout")
 * @Form\Hydrator("\Zend\Stdlib\Hydrator\ObjectProperty")
 */
class Author extends AbstractEntity
{
    
    /**
     * users unique id
     * 
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Form\Required(false)
     * @Form\Attributes({"type":"hidden"})
     * @Form\Filter({"name": "Zucchi\Filter\Cast\Integer"})
     */
    public $id;
    
    /**
     * 
     * @var string
     * @ORM\Column(type="string")
     */
    public $name;
    
    /**
     * 
     * @var string
     * @ORM\Column(type="string")
     */
    public $email;
    
    /**
     * 
     * @var unknown_type
     * @ORM\Column(type="string")
     */
    public $homepage;
    
    /**
     * 
     * @var array
     * @ORM\ManyToOne(targetEntity="ZucchiLayout\Entity\Layout")
     * @ORM\JoinColumn(name="Layout_id", referencedColumnName="id", onDelete="CASCADE")
     */
    public $Layout;
}