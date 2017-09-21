<?php
namespace CASHMusic\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * CommerceExternalFulfillmentTiers
 *
 * @Table(name="commerce_external_fulfillment_tiers")
 * @Entity(repositoryClass="CASHMusic\Entities\CASHEntityRepository") @HasLifecycleCallbacks */
class CommerceExternalFulfillmentTier extends EntityBase
{

    protected $fillable = ['system_job_id', 'fulfillment_job_id', 'process_id', 'user_id', '', 'name', 'upc', 'metadata', 'status', 'physical', 'shipped'];
    /**
     * @var integer
     *
     * @Column(name="system_job_id", type="integer", nullable=false)
     */
    protected $system_job_id;

    /**
     * @var integer
     *
     * @Column(name="fulfillment_job_id", type="integer", nullable=false)
     */
    protected $fulfillment_job_id;

    /**
     * @var integer
     *
     * @Column(name="process_id", type="integer", nullable=false)
     */
    protected $process_id;

    /**
     * @var integer
     *
     * @Column(name="user_id", type="integer", nullable=false)
     */
    protected $user_id;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @Column(name="upc", type="string", length=255, nullable=true)
     */
    protected $upc;

    /**
     * @var string
     *
     * @Column(name="metadata", type="json_array", length=16777215, nullable=true)
     */
    protected $metadata;

    /**
     * @var integer
     *
     * @Column(name="status", type="integer", nullable=false)
     */
    protected $status = '0';

    /**
     * @var integer
     *
     * @Column(name="physical", type="integer", nullable=false)
     */
    protected $physical = '0';

    /**
     * @var integer
     *
     * @Column(name="shipped", type="integer", nullable=false)
     */
    protected $shipped = '0';

    /**
     * @var integer
     *
     * @Column(name="modification_date", type="integer", nullable=true, options={"default": "UNIX_TIMESTAMP()"})
     */
    protected $modification_date;

    /**
     * @var integer
     *
     * @Column(name="creation_date", type="integer", nullable=true, options={"default": "UNIX_TIMESTAMP()"})
     */
    protected $creation_date;

    /** @Id @Column(type="integer") @GeneratedValue(strategy="AUTO") **/
    protected $id;

    public function job($conditions=false) {
        return $this->hasOne("CommerceExternalFulfillmentJob", "fulfillment_job_id", "id");
    }

    public function orders($conditions=false) {
        return $this->hasMany("CommerceExternalFulfillmentOrder", "id", "tier_id", $conditions);
    }
}

