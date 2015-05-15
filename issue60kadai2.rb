# 1から10までの配列を作ってください
ary = (1..10).to_a
print ary 


print "\n"

# 配列に値を追加してください
ary.push(11)
print ary 


print "\n"

# 配列から値を順番に取り出して表示してください
ary.each do |i|
  print i
end


print "\n"

# 1から10の配列中身を全部足してください
sum = ary.inject do |sum, x| 
  sum + x
end

puts sum
