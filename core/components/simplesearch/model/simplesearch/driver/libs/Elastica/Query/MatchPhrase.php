<?php

namespace Elastica\Query;

/**
 * Match Phrase query.
 *
 * @author Jacques Moati <jacques@moati.net>
 * @author Tobias Schultze <http://tobion.de>
 *
 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-match-query-phrase.html
 */
class MatchPhrase extends AbstractQuery
{
    /**
     * @param string $field
     * @param mixed  $values
     */
    public function __construct(string $field = null, $values = null)
    {
        if (null !== $field && null !== $values) {
            $this->setParam($field, $values);
        }
    }

    /**
     * Sets a param for the message array.
     *
     * @param string $field
     * @param mixed  $values
     *
     * @return $this
     */
    public function setField(string $field, $values): self
    {
        return $this->setParam($field, $values);
    }

    /**
     * Sets a param for the given field.
     *
     * @param string $field
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    public function setFieldParam(string $field, string $key, string $value): self
    {
        if (!isset($this->_params[$field])) {
            $this->_params[$field] = [];
        }

        $this->_params[$field][$key] = $value;

        return $this;
    }

    /**
     * Sets the query string.
     *
     * @param string $field
     * @param string $query
     *
     * @return $this
     */
    public function setFieldQuery(string $field, string $query): self
    {
        return $this->setFieldParam($field, 'query', $query);
    }

    /**
     * Set field analyzer.
     *
     * @param string $field
     * @param string $analyzer
     *
     * @return $this
     */
    public function setFieldAnalyzer(string $field, string $analyzer): self
    {
        return $this->setFieldParam($field, 'analyzer', $analyzer);
    }

    /**
     * Set field boost value.
     *
     * If not set, defaults to 1.0.
     *
     * @param string $field
     * @param float  $boost
     *
     * @return $this
     */
    public function setFieldBoost(string $field, float $boost = 1.0): self
    {
        return $this->setFieldParam($field, 'boost', $boost);
    }
}
