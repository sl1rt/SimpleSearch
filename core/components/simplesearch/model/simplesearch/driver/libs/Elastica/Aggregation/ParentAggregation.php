<?php

namespace Elastica\Aggregation;

/**
 * Class ParentAggregation.
 *
 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-aggregations-bucket-parent-aggregation.html
 */
class ParentAggregation extends AbstractAggregation
{
    protected function _getBaseName()
    {
        return 'parent';
    }

    /**
     * Set the child type for this aggregation.
     *
     * @param string $field the child type that should be selected
     *
     * @return $this
     */
    public function setType($type)
    {
        return $this->setParam('type', $type);
    }
}
