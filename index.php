<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-4xl font-bold text-emerald-600 mb-8">🌌 星语空间</h1>
        
        <!-- 发帖框 -->
        <div class="bg-white rounded-xl p-6 shadow-lg mb-6">
            <form action="post.php" method="POST">
                <textarea 
                    name="content"
                    class="w-full p-4 border rounded-lg focus:ring-2 focus:ring-emerald-500"
                    placeholder="输入你的匿名动态..."
                ></textarea>
                <button 
                    type="submit"
                    class="mt-2 bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-2 rounded-full float-right transition-colors"
                >
                    发射你的星语 ✨
                </button>
            </form>
        </div>

        <!-- 动态列表 -->
        <?php while($post = mysqli_fetch_assoc($result)): ?>
            <div class="bg-white rounded-xl p-6 shadow-lg mb-6">
                <div class="text-gray-800 mb-4"><?= htmlspecialchars($post['content']) ?></div>
                <div class="text-sm text-gray-400">🕒 <?= $post['created_at'] ?></div>
                
                <!-- 评论表单 -->
                <form action="comment.php" method="POST" class="mt-6">
                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                    <div class="flex gap-2">
                        <input 
                            type="text" 
                            name="content"
                            class="flex-1 p-2 border rounded-lg"
                            placeholder="留下你的星尘印记..."
                        >
                        <button class="bg-gray-100 hover:bg-gray-200 px-4 rounded-lg transition-colors">
                            💬 发送
                        </button>
                    </div>
                </form>

                <!-- 评论列表 -->
                <?php while($comment = mysqli_fetch_assoc($comment_result)): ?>
                    <div class="mt-4 pl-4 border-l-4 border-emerald-100">
                        <div class="text-gray-600"><?= htmlspecialchars($comment['content']) ?></div>
                        <div class="text-xs text-gray-400 mt-1">🕒 <?= $comment['created_at'] ?></div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>