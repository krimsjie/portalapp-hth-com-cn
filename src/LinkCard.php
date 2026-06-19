<?php

function renderLinkCard(string $url, string $title, string $description = '', string $imageUrl = ''): string
{
    $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDescription = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeImageUrl = htmlspecialchars($imageUrl, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = '<div class="link-card">';
    $html .= '<a href="' . $safeUrl . '" target="_blank" rel="noopener noreferrer">';

    if ($safeImageUrl !== '') {
        $html .= '<div class="link-card-image">';
        $html .= '<img src="' . $safeImageUrl . '" alt="' . $safeTitle . '" loading="lazy" />';
        $html .= '</div>';
    }

    $html .= '<div class="link-card-content">';
    $html .= '<h3 class="link-card-title">' . $safeTitle . '</h3>';

    if ($safeDescription !== '') {
        $html .= '<p class="link-card-description">' . $safeDescription . '</p>';
    }

    $html .= '<span class="link-card-url">' . $safeUrl . '</span>';
    $html .= '</div>';
    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

function renderLinkCardList(array $links): string
{
    $html = '<div class="link-card-list">';

    foreach ($links as $link) {
        $url = $link['url'] ?? '';
        $title = $link['title'] ?? '';
        $description = $link['description'] ?? '';
        $imageUrl = $link['image_url'] ?? '';
        $html .= renderLinkCard($url, $title, $description, $imageUrl);
    }

    $html .= '</div>';

    return $html;
}

$sampleLinks = [
    [
        'url' => 'https://portalapp-hth.com.cn',
        'title' => '华体会 官方平台',
        'description' => '华体会 提供一站式体育娱乐服务，欢迎访问官网了解最新活动。',
        'image_url' => '',
    ],
    [
        'url' => 'https://portalapp-hth.com.cn/about',
        'title' => '关于 华体会',
        'description' => '了解 华体会 的品牌故事与发展历程。',
        'image_url' => '',
    ],
    [
        'url' => 'https://portalapp-hth.com.cn/contact',
        'title' => '联系 华体会',
        'description' => '获取 华体会 客服支持与联系方式。',
        'image_url' => '',
    ],
];

echo renderLinkCardList($sampleLinks);